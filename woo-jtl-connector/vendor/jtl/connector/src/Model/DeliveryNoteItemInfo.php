<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * @access     public
 * @package    Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class DeliveryNoteItemInfo extends AbstractModel
{
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("batch")
     * @Serializer\Accessor(getter="getBatch",setter="setBatch")
     */
    protected string $batch = '';

    /**
     * @var \DateTimeInterface|null
     * @Serializer\Type("DateTimeInterface")
     * @Serializer\SerializedName("bestBefore")
     * @Serializer\Accessor(getter="getBestBefore",setter="setBestBefore")
     */
    protected ?\DateTimeInterface $bestBefore = null;

    /**
     * @var double
     * @Serializer\Type("double")
     * @Serializer\SerializedName("quantity")
     * @Serializer\Accessor(getter="getQuantity",setter="setQuantity")
     */
    protected float $quantity = 0.0;

    /**
     * @var integer
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("warehouseId")
     * @Serializer\Accessor(getter="getWarehouseId",setter="setWarehouseId")
     */
    protected int $warehouseId = 0;

    /**
     * @return string
     */
    public function getBatch(): string
    {
        return $this->batch;
    }

    /**
     * @param string $batch
     *
     * @return DeliveryNoteItemInfo
     */
    public function setBatch(string $batch): DeliveryNoteItemInfo
    {
        $this->batch = $batch;

        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getBestBefore(): ?\DateTimeInterface
    {
        return $this->bestBefore;
    }

    /**
     * @param \DateTimeInterface $bestBefore
     *
     * @return DeliveryNoteItemInfo
     */
    public function setBestBefore(\DateTimeInterface $bestBefore = null): DeliveryNoteItemInfo
    {
        $this->bestBefore = $bestBefore;

        return $this;
    }

    /**
     * @return double
     */
    public function getQuantity(): float
    {
        return $this->quantity;
    }

    /**
     * @param double $quantity
     *
     * @return DeliveryNoteItemInfo
     */
    public function setQuantity(float $quantity): DeliveryNoteItemInfo
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @return int
     */
    public function getWarehouseId(): int
    {
        return $this->warehouseId;
    }

    /**
     * @param integer $warehouseId
     *
     * @return DeliveryNoteItemInfo
     */
    public function setWarehouseId(int $warehouseId): DeliveryNoteItemInfo
    {
        $this->warehouseId = $warehouseId;

        return $this;
    }
}
