<?php
namespace jtl\Connector\Event\Product;

use Symfony\Contracts\EventDispatcher\Event;
use jtl\Connector\Model\Statistic;

class ProductAfterStatisticEvent extends Event
{
    const EVENT_NAME = 'product.after.statistic';

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
