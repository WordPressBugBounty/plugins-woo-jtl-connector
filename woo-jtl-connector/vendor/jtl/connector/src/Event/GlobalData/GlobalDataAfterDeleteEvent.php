<?php
namespace jtl\Connector\Event\GlobalData;

use Symfony\Contracts\EventDispatcher\Event;
use jtl\Connector\Model\GlobalData;

class GlobalDataAfterDeleteEvent extends Event
{
    const EVENT_NAME = 'globaldata.after.delete';

    protected $globalData;

    public function __construct(GlobalData &$globalData)
    {
        $this->globalData = $globalData;
    }

    public function getGlobalData()
    {
        return $this->globalData;
    }
}
