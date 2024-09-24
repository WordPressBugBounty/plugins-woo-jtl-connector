<?php
namespace jtl\Connector\Event\Connector;

use Symfony\Contracts\EventDispatcher\Event;
use jtl\Connector\Model\Statistic;

class ConnectorAfterStatisticEvent extends Event
{
    const EVENT_NAME = 'connector.after.statistic';

    protected $statistic;

    public function __construct(Statistic &$statistic)
    {
        $this->statistic = $statistic;
    }

    public function getStatistic()
    {
        return $this->statistic;
    }
}
