<?php
namespace jtl\Connector\Event\GlobalData;

use Symfony\Contracts\EventDispatcher\Event;
use jtl\Connector\Model\GlobalData;

class GlobalDataAfterPushEvent extends Event
{
    const EVENT_NAME = 'globaldata.after.push';

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
