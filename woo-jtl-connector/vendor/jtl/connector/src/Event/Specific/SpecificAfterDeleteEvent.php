<?php
namespace jtl\Connector\Event\Specific;

use Symfony\Contracts\EventDispatcher\Event;
use jtl\Connector\Model\Specific;

class SpecificAfterDeleteEvent extends Event
{
    const EVENT_NAME = 'specific.after.delete';

    protected $specific;

    public function __construct(Specific &$specific)
    {
        $this->specific = $specific;
    }

    public function getSpecific()
    {
        return $this->specific;
    }
}
