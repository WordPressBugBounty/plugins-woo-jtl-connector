<?php
namespace jtl\Connector\Event\Payment;

use Symfony\Contracts\EventDispatcher\Event;
use jtl\Connector\Model\Payment;

class PaymentBeforeDeleteEvent extends Event
{
    const EVENT_NAME = 'payment.before.delete';

    protected $payment;

    public function __construct(Payment &$payment)
    {
        $this->payment = $payment;
    }

    public function getPayment()
    {
        return $this->payment;
    }
}
