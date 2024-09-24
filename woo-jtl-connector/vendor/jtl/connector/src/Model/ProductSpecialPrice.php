<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * Special product price properties to specify date and stock limits.
 *
 * @access     public
 * @package    Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class ProductSpecialPrice extends AbstractIdentity
{
    /**
     * @var \DateTimeInterface|null Optional: Activate special price from date
     * @Serializer\Type("DateTimeInterface")
     * @Serializer\SerializedName("activeFromDate")
     * @Serializer\Accessor(getter="getActiveFromDate",setter="setActiveFromDate")
     */
    protected ?\DateTimeInterface $activeFromDate = null;

    /**
     * @var \DateTimeInterface|null Optional: Special price active until date
     * @Serializer\Type("DateTimeInterface")
     * @Serializer\SerializedName("activeUntilDate")
     * @Serializer\Accessor(getter="getActiveUntilDate",setter="setActiveUntilDate")
     */
    protected ?\DateTimeInterface $activeUntilDate = null;

    /**
     * @var boolean Optional: Consider activeFrom/activeUntil date range.
     *              If true, specialPrice will get active from activeFrom-date and will stop after activeUntil-date.
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("considerDateLimit")
     * @Serializer\Accessor(getter="getConsiderDateLimit",setter="setConsiderDateLimit")
     */
    protected bool $considerDateLimit = false;

    /**
     * @var boolean Optional: Consider stockLimit value.
     *              If true, specialPrice will be only active until product stockLevel is greater or equal stockLimit.
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("considerStockLimit")
     * @Serializer\Accessor(getter="getConsiderStockLimit",setter="setConsiderStockLimit")
     */
    protected bool $considerStockLimit = false;

    /**
     * @var boolean Special price is active? Default true, to activate specialPrice.
     *              Special price can still be inactivated, if date or stock Limitations do not match.
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("isActive")
     * @Serializer\Accessor(getter="getIsActive",setter="setIsActive")
     */
    protected bool $isActive = false;

    /**
     * @var integer Optional: SpecialPrice active until stock level quantity
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("stockLimit")
     * @Serializer\Accessor(getter="getStockLimit",setter="setStockLimit")
     */
    protected int $stockLimit = 0;

    /**
     * @var ProductSpecialPriceItem[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\ProductSpecialPriceItem>")
     * @Serializer\SerializedName("items")
     * @Serializer\AccessType("reflection")
     */
    protected array $items = [];

    /**
     * @return \DateTimeInterface Optional: Activate special price from date
     */
    public function getActiveFromDate(): ?\DateTimeInterface
    {
        return $this->activeFromDate;
    }

    /**
     * @param \DateTimeInterface|null $activeFromDate Optional: Activate special price from date
     *
     * @return ProductSpecialPrice
     */
    public function setActiveFromDate(?\DateTimeInterface $activeFromDate = null): ProductSpecialPrice
    {
        $this->activeFromDate = $activeFromDate;

        return $this;
    }

    /**
     * @return \DateTimeInterface Optional: Special price active until date
     */
    public function getActiveUntilDate(): ?\DateTimeInterface
    {
        return $this->activeUntilDate;
    }

    /**
     * @param \DateTimeInterface|null $activeUntilDate Optional: Special price active until date
     *
     * @return ProductSpecialPrice
     */
    public function setActiveUntilDate(?\DateTimeInterface $activeUntilDate = null): ProductSpecialPrice
    {
        $this->activeUntilDate = $activeUntilDate;

        return $this;
    }

    /**
     * @return boolean Optional: Consider activeFrom/activeUntil date range.
     *                  If true, specialPrice will get active from activeFrom-date and will stop after activeUntil-date.
     */
    public function getConsiderDateLimit(): bool
    {
        return $this->considerDateLimit;
    }

    /**
     * @param boolean $considerDateLimit Optional: Consider activeFrom/activeUntil date range.
     *                                   If true, specialPrice will get active from activeFrom-date and will
     *                                   stop after activeUntil-date.
     *
     * @return ProductSpecialPrice
     */
    public function setConsiderDateLimit(bool $considerDateLimit): ProductSpecialPrice
    {
        $this->considerDateLimit = $considerDateLimit;

        return $this;
    }

    /**
     * @return boolean Optional: Consider stockLimit value.
     *                  If true, specialPrice will be only active until product
     *                  stockLevel is greater or equal stockLimit.
     */
    public function getConsiderStockLimit(): bool
    {
        return $this->considerStockLimit;
    }

    /**
     * @param boolean $considerStockLimit Optional: Consider stockLimit value.
     *                                    If true, specialPrice will be only active until product stockLevel
     *                                    is greater or equal stockLimit.
     *
     * @return ProductSpecialPrice
     */
    public function setConsiderStockLimit(bool $considerStockLimit): ProductSpecialPrice
    {
        $this->considerStockLimit = $considerStockLimit;

        return $this;
    }

    /**
     * @return boolean Special price is active? Default true, to activate specialPrice.
     *                  Special price can still be inactivated, if date or stock Limitations do not match.
     */
    public function getIsActive(): bool
    {
        return $this->isActive;
    }

    /**
     * @param boolean $isActive         Special price is active? Default true, to activate specialPrice.
     *                                  Special price can still be inactivated, if date or stock Limitations do not
     *                                  match.
     *
     * @return ProductSpecialPrice
     */
    public function setIsActive(bool $isActive): ProductSpecialPrice
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * @return integer Optional: SpecialPrice active until stock level quantity
     */
    public function getStockLimit(): int
    {
        return $this->stockLimit;
    }

    /**
     * @param integer $stockLimit Optional: SpecialPrice active until stock level quantity
     *
     * @return ProductSpecialPrice
     */
    public function setStockLimit(int $stockLimit): ProductSpecialPrice
    {
        $this->stockLimit = $stockLimit;

        return $this;
    }

    /**
     * @param ProductSpecialPriceItem $item
     *
     * @return ProductSpecialPrice
     */
    public function addItem(ProductSpecialPriceItem $item): ProductSpecialPrice
    {
        $this->items[] = $item;

        return $this;
    }

    /**
     * @return ProductSpecialPriceItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param ProductSpecialPriceItem ...$items
     *
     * @return ProductSpecialPrice
     */
    public function setItems(ProductSpecialPriceItem ...$items): ProductSpecialPrice
    {
        $this->items = $items;

        return $this;
    }

    /**
     * @return ProductSpecialPrice
     */
    public function clearItems(): ProductSpecialPrice
    {
        $this->items = [];

        return $this;
    }
}
