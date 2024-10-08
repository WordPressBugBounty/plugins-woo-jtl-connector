<?php
namespace jtl\Connector\Event\ProductStockLevel;

use Symfony\Contracts\EventDispatcher\Event;
use jtl\Connector\Model\ProductStockLevel;

class ProductStockLevelBeforePushEvent extends Event
{
    const EVENT_NAME = 'productstocklevel.before.push';

    protected $productStockLevel;

    public function __construct(ProductStockLevel &$productStockLevel)
    {
        $this->productStockLevel = $productStockLevel;
    }

    public function getProductStockLevel()
    {
        return $this->productStockLevel;
    }
}
