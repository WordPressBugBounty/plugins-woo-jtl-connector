<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;
use Jtl\Connector\Core\Exception\MustNotBeNullException;
use Jtl\Connector\Core\Utilities\Validator\Validate;

/**
 * Product to warehouse info association.
 *
 * @access     public
 * @package    Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class ProductWarehouseInfo extends AbstractModel
{
    /**
     * @var Identity
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("warehouseId")
     * @Serializer\Accessor(getter="getwarehouseId",setter="setwarehouseId")
     */
    protected Identity $warehouseId;

    /**
     * @var double Optional product inflow quantity for specified warehouse
     * @Serializer\Type("double")
     * @Serializer\SerializedName("inflowQuantity")
     * @Serializer\Accessor(getter="getInflowQuantity",setter="setInflowQuantity")
     */
    protected float $inflowQuantity = 0.0;

    /**
     * @var double
     * @Serializer\Type("double")
     * @Serializer\SerializedName("stockLevel")
     * @Serializer\Accessor(getter="getstockLevel",setter="setstockLevel")
     */
    protected float $stockLevel = 0.0;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->warehouseId = new Identity();
    }

    /**
     * @return Identity
     * @throws MustNotBeNullException|\TypeError
     */
    public function getWarehouseId(): Identity
    {
        return Validate::checkIdentityAndNotNull($this->warehouseId);
    }

    /**
     * @param Identity $warehouseId
     *
     * @return ProductWarehouseInfo
     */
    public function setWarehouseId(Identity $warehouseId): ProductWarehouseInfo
    {
        $this->warehouseId = $warehouseId;

        return $this;
    }

    /**
     * @return double Optional product inflow quantity for specified warehouse
     */
    public function getInflowQuantity(): float
    {
        return $this->inflowQuantity;
    }

    /**
     * @param double $inflowQuantity Optional product inflow quantity for specified warehouse
     *
     * @return ProductWarehouseInfo
     */
    public function setInflowQuantity(float $inflowQuantity): ProductWarehouseInfo
    {
        $this->inflowQuantity = $inflowQuantity;

        return $this;
    }

    /**
     * @return double
     */
    public function getStockLevel(): float
    {
        return $this->stockLevel;
    }

    /**
     * @param double $stockLevel
     *
     * @return ProductWarehouseInfo
     */
    public function setStockLevel(float $stockLevel): ProductWarehouseInfo
    {
        $this->stockLevel = $stockLevel;

        return $this;
    }
}
