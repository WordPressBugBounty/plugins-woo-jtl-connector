<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Test\Subscriber;

use Jtl\Connector\Core\Database\Sqlite3;
use Jtl\Connector\Core\Event\BoolEvent;
use Jtl\Connector\Core\Exception\PartialSyncException;
use Jtl\Connector\Core\Subscriber\SyncErrorSubscriber;
use Jtl\Connector\Core\SyncError\SqliteSyncErrorCollector;
use Jtl\Connector\Core\SyncError\SyncErrorCollectorInterface;
use PHPUnit\Framework\TestCase;

class SyncErrorSubscriberTest extends TestCase
{
    protected SyncErrorCollectorInterface $collector;
    protected SyncErrorSubscriber         $subscriber;

    /**
     * @return void
     * @throws \Jtl\Connector\Core\Exception\DatabaseException
     */
    protected function setUp(): void
    {
        parent::setUp();
        $sqlite = new Sqlite3();
        $sqlite->connect(['location' => ':memory:']);
        $this->collector  = new SqliteSyncErrorCollector($sqlite);
        $this->subscriber = new SyncErrorSubscriber($this->collector);
    }

    /**
     * @return void
     */
    public function testAfterInitClearsErrors(): void
    {
        $this->collector->collect('Product', 'push', '1', new \RuntimeException('Error'));
        $this->assertTrue($this->collector->hasErrors());

        $result = true;
        $event  = new BoolEvent($result);
        $this->subscriber->afterInit($event);

        $this->assertFalse($this->collector->hasErrors());
    }

    /**
     * @return void
     */
    public function testAfterFinishDoesNothingWhenNoErrors(): void
    {
        $result = true;
        $event  = new BoolEvent($result);

        // Should not throw
        $this->subscriber->afterFinish($event);
        $this->assertTrue(true);
    }

    /**
     * @return void
     */
    public function testAfterFinishThrowsWhenErrorsExist(): void
    {
        $this->collector->collect('Product', 'push', '1', new \RuntimeException('Error'));

        $result = true;
        $event  = new BoolEvent($result);

        $this->expectException(PartialSyncException::class);
        $this->expectExceptionMessage('1 error(s)');
        $this->subscriber->afterFinish($event);
    }

    /**
     * @return void
     */
    public function testAfterFinishDoesNotClearErrors(): void
    {
        $this->collector->collect('Product', 'push', '1', new \RuntimeException('Error'));

        $result = true;
        $event  = new BoolEvent($result);

        try {
            $this->subscriber->afterFinish($event);
        } catch (PartialSyncException $e) {
            // Expected
        }

        // Errors should still be present (cleared on next init, not after finish)
        $this->assertTrue($this->collector->hasErrors());
    }

    /**
     * @return void
     */
    public function testGetSubscribedEventsReturnsCorrectEvents(): void
    {
        $events = SyncErrorSubscriber::getSubscribedEvents();
        $this->assertCount(2, $events);
    }
}
