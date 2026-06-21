<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Exception;

use Jtl\Connector\Core\SyncError\SyncErrorEntry;

class PartialSyncException extends \RuntimeException
{
    /** @var SyncErrorEntry[] */
    protected array $errors;

    /**
     * @param SyncErrorEntry[] $errors
     */
    public function __construct(array $errors)
    {
        $this->errors = $errors;
        parent::__construct($this->buildMessage($errors));
    }

    /**
     * @return SyncErrorEntry[]
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * @param SyncErrorEntry[] $errors
     *
     * @return string
     */
    protected function buildMessage(array $errors): string
    {
        $count = \count($errors);
        $lines = [\sprintf('Sync completed with %d error(s):', $count)];

        foreach ($errors as $index => $error) {
            $lines[] = \sprintf(
                '  %d) [%s.%s] entity=%s: %s',
                $index + 1,
                $error->getController(),
                $error->getAction(),
                $error->getEntityId() !== '' ? $error->getEntityId() : 'N/A',
                $error->getMessage()
            );
        }

        return \implode("\n", $lines);
    }
}
