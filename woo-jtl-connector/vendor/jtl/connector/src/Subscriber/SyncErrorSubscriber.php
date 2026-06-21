<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Subscriber;

use Jawira\CaseConverter\CaseConverterException;
use Jtl\Connector\Core\Definition\Action;
use Jtl\Connector\Core\Definition\Controller;
use Jtl\Connector\Core\Definition\Event;
use Jtl\Connector\Core\Event\BoolEvent;
use Jtl\Connector\Core\Exception\DefinitionException;
use Jtl\Connector\Core\Exception\PartialSyncException;
use Jtl\Connector\Core\SyncError\SyncErrorCollectorInterface;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class SyncErrorSubscriber implements EventSubscriberInterface, LoggerAwareInterface
{
    protected SyncErrorCollectorInterface $collector;
    protected LoggerInterface             $logger;

    /**
     * @param SyncErrorCollectorInterface $collector
     */
    public function __construct(SyncErrorCollectorInterface $collector)
    {
        $this->collector = $collector;
        $this->logger    = new NullLogger();
    }

    /**
     * @inheritDoc
     * @throws DefinitionException|CaseConverterException
     *
     * @return array<string, array<int, array<int, int|string>>>
     */
    public static function getSubscribedEvents(): array
    {
        return [
            Event::createCoreEventName(Controller::CONNECTOR, Action::INIT, Event::AFTER) => [
                ['afterInit', 0],
            ],
            Event::createCoreEventName(Controller::CONNECTOR, Action::FINISH, Event::AFTER) => [
                ['afterFinish', 0],
            ],
        ];
    }

    /**
     * Clear errors from the previous sync at the start of a new sync.
     *
     * @param BoolEvent $event
     *
     * @return void
     */
    public function afterInit(BoolEvent $event): void
    {
        $this->logger->debug('SyncErrorSubscriber: Clearing sync errors from previous sync');
        $this->collector->clear();
    }

    /**
     * After the sync finishes, throw an aggregate exception if there were errors.
     * Errors are NOT cleared here — they persist until the next sync's afterInit().
     * This allows Wawi's retry mechanism to see the same errors.
     *
     * @param BoolEvent $event
     *
     * @return void
     * @throws PartialSyncException
     */
    public function afterFinish(BoolEvent $event): void
    {
        if (!$this->collector->hasErrors()) {
            return;
        }

        $errors = $this->collector->getAll();
        $this->logger->info(\sprintf(
            'SyncErrorSubscriber: Throwing PartialSyncException with %d error(s)',
            \count($errors)
        ));

        throw new PartialSyncException($errors);
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
