<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Test\SyncError;

use Jtl\Connector\Core\Database\Sqlite3;
use Jtl\Connector\Core\SyncError\SqliteSyncErrorCollector;
use Jtl\Connector\Core\SyncError\SyncErrorEntry;
use PHPUnit\Framework\TestCase;

class SqliteSyncErrorCollectorTest extends TestCase
{
    protected SqliteSyncErrorCollector $collector;
    protected Sqlite3                 $sqlite;

    /**
     * @return void
     * @throws \Jtl\Connector\Core\Exception\DatabaseException
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->sqlite = new Sqlite3();
        $this->sqlite->connect(['location' => ':memory:']);
        $this->collector = new SqliteSyncErrorCollector($this->sqlite);
    }

    /**
     * @return void
     */
    public function testCollectAndGetAll(): void
    {
        $this->assertFalse($this->collector->hasErrors());
        $this->assertSame([], $this->collector->getAll());

        $this->collector->collect('Product', 'push', '42', new \RuntimeException('Something broke'));
        $this->collector->collect('Category', 'delete', '7', new \RuntimeException('Category not found'));

        $this->assertTrue($this->collector->hasErrors());

        $errors = $this->collector->getAll();
        $this->assertCount(2, $errors);

        $this->assertInstanceOf(SyncErrorEntry::class, $errors[0]);
        $this->assertSame('Product', $errors[0]->getController());
        $this->assertSame('push', $errors[0]->getAction());
        $this->assertSame('42', $errors[0]->getEntityId());
        $this->assertSame('Something broke', $errors[0]->getMessage());

        $this->assertSame('Category', $errors[1]->getController());
        $this->assertSame('delete', $errors[1]->getAction());
    }

    /**
     * @return void
     */
    public function testClearRemovesAllErrors(): void
    {
        $this->collector->collect('Product', 'push', '1', new \RuntimeException('Error 1'));
        $this->collector->collect('Product', 'push', '2', new \RuntimeException('Error 2'));
        $this->assertTrue($this->collector->hasErrors());

        $this->collector->clear();
        $this->assertFalse($this->collector->hasErrors());
        $this->assertSame([], $this->collector->getAll());
    }

    /**
     * @return void
     */
    public function testHasErrorsReturnsFalseWhenEmpty(): void
    {
        $this->assertFalse($this->collector->hasErrors());
    }

    /**
     * @return void
     */
    public function testCreatedAtIsPopulated(): void
    {
        $this->collector->collect('Product', 'push', '1', new \RuntimeException('Error'));
        $errors = $this->collector->getAll();
        $this->assertCount(1, $errors);
        $this->assertNotEmpty($errors[0]->getCreatedAt());
    }

    /**
     * @return void
     */
    public function testPersistsAcrossGetAllCalls(): void
    {
        $this->collector->collect('Product', 'push', '1', new \RuntimeException('Error'));

        $first  = $this->collector->getAll();
        $second = $this->collector->getAll();

        $this->assertCount(1, $first);
        $this->assertCount(1, $second);
        $this->assertSame($first[0]->getMessage(), $second[0]->getMessage());
    }

    /**
     * @return void
     */
    public function testScopeIsolatesErrors(): void
    {
        $collectorA = new SqliteSyncErrorCollector($this->sqlite);
        $collectorA->setScope('customer-1');

        $collectorB = new SqliteSyncErrorCollector($this->sqlite);
        $collectorB->setScope('customer-2');

        $collectorA->collect('Product', 'push', '1', new \RuntimeException('Error A'));
        $collectorB->collect('Category', 'delete', '2', new \RuntimeException('Error B'));
        $collectorB->collect('Image', 'push', '3', new \RuntimeException('Error B2'));

        $this->assertTrue($collectorA->hasErrors());
        $this->assertTrue($collectorB->hasErrors());

        $errorsA = $collectorA->getAll();
        $errorsB = $collectorB->getAll();

        $this->assertCount(1, $errorsA);
        $this->assertCount(2, $errorsB);

        $this->assertSame('Error A', $errorsA[0]->getMessage());
        $this->assertSame('Error B', $errorsB[0]->getMessage());
        $this->assertSame('Error B2', $errorsB[1]->getMessage());
    }

    /**
     * @return void
     */
    public function testClearOnlyClearsCurrentScope(): void
    {
        $collectorA = new SqliteSyncErrorCollector($this->sqlite);
        $collectorA->setScope('customer-1');

        $collectorB = new SqliteSyncErrorCollector($this->sqlite);
        $collectorB->setScope('customer-2');

        $collectorA->collect('Product', 'push', '1', new \RuntimeException('Error A'));
        $collectorB->collect('Category', 'delete', '2', new \RuntimeException('Error B'));

        $collectorA->clear();

        $this->assertFalse($collectorA->hasErrors());
        $this->assertTrue($collectorB->hasErrors());
        $this->assertCount(1, $collectorB->getAll());
    }

    /**
     * @return void
     */
    public function testUnscopedDefaultWorksAsEmptyScope(): void
    {
        // Without setScope, errors use empty string scope
        $this->collector->collect('Product', 'push', '1', new \RuntimeException('Unscoped'));

        $scoped = new SqliteSyncErrorCollector($this->sqlite);
        $scoped->setScope('customer-1');
        $scoped->collect('Product', 'push', '2', new \RuntimeException('Scoped'));

        // Unscoped collector should only see its own error
        $this->assertCount(1, $this->collector->getAll());
        $this->assertSame('Unscoped', $this->collector->getAll()[0]->getMessage());

        // Scoped collector should only see its own error
        $this->assertCount(1, $scoped->getAll());
        $this->assertSame('Scoped', $scoped->getAll()[0]->getMessage());
    }
}
