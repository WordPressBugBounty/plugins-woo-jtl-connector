<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\SyncError;

interface SyncErrorCollectorAwareInterface
{
    /**
     * @param SyncErrorCollectorInterface $collector
     *
     * @return void
     */
    public function setSyncErrorCollector(SyncErrorCollectorInterface $collector): void;
}
