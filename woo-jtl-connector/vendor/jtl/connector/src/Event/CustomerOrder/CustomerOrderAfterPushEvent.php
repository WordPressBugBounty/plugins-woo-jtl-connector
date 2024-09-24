<?php
namespace jtl\Connector\Event\CustomerOrder;

use Symfony\Contracts\EventDispatcher\Event;
use jtl\Connector\Model\CustomerOrder;

class CustomerOrderAfterPushEvent extends Event
{
    const EVENT_NAME = 'customerorder.after.push';

    protected $customerOrder;

    public function __construct(CustomerOrder &$customerOrder)
    {
        $this->customerOrder = $customerOrder;
    }

    public function getCustomerOrder()
    {
        return $this->customerOrder;
    }
}
