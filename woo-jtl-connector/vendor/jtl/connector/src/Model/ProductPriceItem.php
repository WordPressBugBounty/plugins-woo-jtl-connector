<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * Product price item properties.
 *
 * @access     public
 * @package    Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class ProductPriceItem extends AbstractModel
{
    /**
     * @var double Price value (net)
     * @Serializer\Type("double")
     * @Serializer\SerializedName("netPrice")
     * @Serializer\Accessor(getter="getNetPrice",setter="setNetPrice")
     */
    protected float $netPrice = 0.0;

    /**
     * @var integer Optional quantity to apply netPrice for. Default 1 for default price.
     *              A quantity value of 3 means that the given product price
     *              will be applied when a customer buys 3 or more items.
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("quantity")
     * @Serializer\Accessor(getter="getQuantity",setter="setQuantity")
     */
    protected int $quantity = 0;

    /**
     * @return double Price value (net)
     */
    public function getNetPrice(): float
    {
        return $this->netPrice;
    }

    /**
     * @param double $netPrice Price value (net)
     *
     * @return ProductPriceItem
     */
    public function setNetPrice(float $netPrice): ProductPriceItem
    {
        $this->netPrice = $netPrice;

        return $this;
    }

    /**
     * @return int Optional quantity to apply netPrice for.
     *                  Default 1 for default price. A quantity value of 3 means that the given product price
     *                  will be applied when a customer buys 3 or more items.
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param integer $quantity Optional quantity to apply netPrice for.
     *                          Default 1 for default price.
     *                          A quantity value of 3 means that the given product price will be applied
     *                          when a customer buys 3 or more items.
     *
     * @return ProductPriceItem
     */
    public function setQuantity(int $quantity): ProductPriceItem
    {
        $this->quantity = $quantity;

        return $this;
    }
}
