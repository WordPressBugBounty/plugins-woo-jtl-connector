<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\SyncError;

use Jtl\Connector\Core\Database\Sqlite3;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

class SqliteSyncErrorCollector implements SyncErrorCollectorInterface, LoggerAwareInterface
{
    protected Sqlite3          $db;
    protected LoggerInterface  $logger;
    protected bool             $tableCreated = false;
    protected string           $scope        = '';

    /**
     * @param Sqlite3 $db
     */
    public function __construct(Sqlite3 $db)
    {
        $this->db     = $db;
        $this->logger = new NullLogger();
        $this->ensureTable();
    }

    /**
     * @return void
     */
    protected function ensureTable(): void
    {
        if ($this->tableCreated) {
            return;
        }

        $this->db->exec(
            'CREATE TABLE IF NOT EXISTS sync_errors ('
            . 'id INTEGER PRIMARY KEY AUTOINCREMENT,'
            . 'scope TEXT NOT NULL DEFAULT \'\',' // phpcs:ignore
            . 'controller TEXT NOT NULL,'
            . 'action TEXT NOT NULL,'
            . 'entity_id TEXT NOT NULL DEFAULT \'\',' // phpcs:ignore
            . 'message TEXT NOT NULL,'
            . 'created_at TEXT NOT NULL'
            . ')'
        );

        // Migrate: add scope column to tables created before multi-tenant support
        /** @var array<int, array<string, mixed>>|null $columns */
        $columns  = $this->db->fetch('PRAGMA table_info(sync_errors)');
        $hasScope = false;
        if (\is_array($columns)) {
            foreach ($columns as $column) {
                if (isset($column['name']) && $column['name'] === 'scope') {
                    $hasScope = true;
                    break;
                }
            }
        }

        if (!$hasScope) {
            $this->db->exec('ALTER TABLE sync_errors ADD COLUMN scope TEXT NOT NULL DEFAULT \'\''); // phpcs:ignore
        }

        $this->tableCreated = true;
    }

    /**
     * @inheritDoc
     */
    public function setScope(string $scope): void
    {
        $this->scope = $scope;
    }

    /**
     * @inheritDoc
     */
    public function collect(string $controller, string $action, string $entityId, \Throwable $error): void
    {
        $this->logger->warning(\sprintf(
            'Sync error collected: [%s.%s] entity=%s message=%s',
            $controller,
            $action,
            $entityId,
            $error->getMessage()
        ));

        $stmt = $this->db->prepare(
            'INSERT INTO sync_errors (scope, controller, action, entity_id, message, created_at)'
            . ' VALUES (:scope, :controller, :action, :entity_id, :message, :created_at)'
        );

        if (!$stmt instanceof \SQLite3Stmt) {
            $this->logger->error('Failed to prepare sync error insert statement');
            return;
        }

        $stmt->bindValue(':scope', $this->scope, \SQLITE3_TEXT);
        $stmt->bindValue(':controller', $controller, \SQLITE3_TEXT);
        $stmt->bindValue(':action', $action, \SQLITE3_TEXT);
        $stmt->bindValue(':entity_id', $entityId, \SQLITE3_TEXT);
        $stmt->bindValue(':message', $error->getMessage(), \SQLITE3_TEXT);
        $stmt->bindValue(':created_at', \date('Y-m-d H:i:s'), \SQLITE3_TEXT);
        $stmt->execute();
    }

    /**
     * @inheritDoc
     */
    public function getAll(): array
    {
        $stmt = $this->db->prepare(
            'SELECT * FROM sync_errors WHERE scope = :scope ORDER BY id ASC'
        );

        if (!$stmt instanceof \SQLite3Stmt) {
            return [];
        }

        $stmt->bindValue(':scope', $this->scope, \SQLITE3_TEXT);
        $result = $stmt->execute();

        if (!$result instanceof \SQLite3Result) {
            return [];
        }

        $entries = [];
        while ($row = $result->fetchArray(\SQLITE3_ASSOC)) {
            /** @var array{controller: string, action: string, entity_id: string, message: string, created_at: string} $row */
            $entries[] = new SyncErrorEntry(
                $row['controller'],
                $row['action'],
                $row['entity_id'],
                $row['message'],
                $row['created_at']
            );
        }

        return $entries;
    }

    /**
     * @inheritDoc
     */
    public function clear(): void
    {
        $stmt = $this->db->prepare('DELETE FROM sync_errors WHERE scope = :scope');

        if (!$stmt instanceof \SQLite3Stmt) {
            return;
        }

        $stmt->bindValue(':scope', $this->scope, \SQLITE3_TEXT);
        $stmt->execute();
    }

    /**
     * @inheritDoc
     */
    public function hasErrors(): bool
    {
        $stmt = $this->db->prepare('SELECT COUNT(*) FROM sync_errors WHERE scope = :scope');

        if (!$stmt instanceof \SQLite3Stmt) {
            return false;
        }

        $stmt->bindValue(':scope', $this->scope, \SQLITE3_TEXT);
        $result = $stmt->execute();

        if (!$result instanceof \SQLite3Result) {
            return false;
        }

        $row = $result->fetchArray(\SQLITE3_NUM);

        return \is_array($row) && (int)$row[0] > 0;
    }

    /**
     * @param LoggerInterface $logger
     *
     * @return void
     */
    public function setLogger(LoggerInterface $logger): void
    {
        $this->logger = $logger;
    }
}
