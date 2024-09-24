<?php
namespace jtl\Connector\Event\Product;

use Symfony\Contracts\EventDispatcher\Event;
use jtl\Connector\Model\Product;

class ProductAfterPushEvent extends Event
{
    const EVENT_NAME = 'product.after.push';

    protected $product;

    public function __construct(Product &$product)
    {
        $this->product = $product;
    }

    public function getProduct()
    {
        return $this->product;
    }
}
