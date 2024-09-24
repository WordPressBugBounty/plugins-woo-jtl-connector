<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * Product variation value model. Each product defines its own variations and variation values.
 *
 * @access     public
 * @package    Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class ProductVariationValue extends AbstractIdentity
{
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ean")
     * @Serializer\Accessor(getter="getEan",setter="setEan")
     */
    protected string $ean = '';

    /**
     * @var double Optional variation extra weight
     * @Serializer\Type("double")
     * @Serializer\SerializedName("extraWeight")
     * @Serializer\Accessor(getter="getExtraWeight",setter="setExtraWeight")
     */
    protected float $extraWeight = 0.0;

    /**
     * @var string Optional Stock Keeping Unit
     * @Serializer\Type("string")
     * @Serializer\SerializedName("sku")
     * @Serializer\Accessor(getter="getSku",setter="setSku")
     */
    protected string $sku = '';

    /**
     * @var integer Optional sort number
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("sort")
     * @Serializer\Accessor(getter="getSort",setter="setSort")
     */
    protected int $sort = 0;

    /**
     * @var double Optional stock level
     * @Serializer\Type("double")
     * @Serializer\SerializedName("stockLevel")
     * @Serializer\Accessor(getter="getStockLevel",setter="setStockLevel")
     */
    protected float $stockLevel = 0.0;

    /**
     * @var ProductVariationValueExtraCharge[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\ProductVariationValueExtraCharge>")
     * @Serializer\SerializedName("extraCharges")
     * @Serializer\AccessType("reflection")
     */
    protected array $extraCharges = [];

    /**
     * @var ProductVariationValueI18n[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\ProductVariationValueI18n>")
     * @Serializer\SerializedName("i18ns")
     * @Serializer\AccessType("reflection")
     */
    protected array $i18ns = [];

    /**
     * @var ProductVariationValueInvisibility[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\ProductVariationValueInvisibility>")
     * @Serializer\SerializedName("invisibilities")
     * @Serializer\AccessType("reflection")
     */
    protected array $invisibilities = [];

    /**
     * @return string
     */
    public function getEan(): string
    {
        return $this->ean;
    }

    /**
     * @param string $ean
     *
     * @return ProductVariationValue
     */
    public function setEan(string $ean): ProductVariationValue
    {
        $this->ean = $ean;

        return $this;
    }

    /**
     * @return double Optional variation extra weight
     */
    public function getExtraWeight(): float
    {
        return $this->extraWeight;
    }

    /**
     * @param double $extraWeight Optional variation extra weight
     *
     * @return ProductVariationValue
     */
    public function setExtraWeight(float $extraWeight): ProductVariationValue
    {
        $this->extraWeight = $extraWeight;

        return $this;
    }

    /**
     * @return string Optional Stock Keeping Unit
     */
    public function getSku(): string
    {
        return $this->sku;
    }

    /**
     * @param string $sku Optional Stock Keeping Unit
     *
     * @return ProductVariationValue
     */
    public function setSku(string $sku): ProductVariationValue
    {
        $this->sku = $sku;

        return $this;
    }

    /**
     * @return integer Optional sort number
     */
    public function getSort(): int
    {
        return $this->sort;
    }

    /**
     * @param integer $sort Optional sort number
     *
     * @return ProductVariationValue
     */
    public function setSort(int $sort): ProductVariationValue
    {
        $this->sort = $sort;

        return $this;
    }

    /**
     * @return double Optional stock level
     */
    public function getStockLevel(): float
    {
        return $this->stockLevel;
    }

    /**
     * @param double $stockLevel Optional stock level
     *
     * @return ProductVariationValue
     */
    public function setStockLevel(float $stockLevel): ProductVariationValue
    {
        $this->stockLevel = $stockLevel;

        return $this;
    }

    /**
     * @param ProductVariationValueExtraCharge $extraCharge
     *
     * @return ProductVariationValue
     */
    public function addExtraCharge(
        ProductVariationValueExtraCharge $extraCharge
    ): ProductVariationValue {
        $this->extraCharges[] = $extraCharge;

        return $this;
    }

    /**
     * @return ProductVariationValueExtraCharge[]
     */
    public function getExtraCharges(): array
    {
        return $this->extraCharges;
    }

    /**
     * @param ProductVariationValueExtraCharge ...$extraCharges
     *
     * @return ProductVariationValue
     */
    public function setExtraCharges(ProductVariationValueExtraCharge ...$extraCharges): ProductVariationValue
    {
        $this->extraCharges = $extraCharges;

        return $this;
    }

    /**
     * @return ProductVariationValue
     */
    public function clearExtraCharges(): ProductVariationValue
    {
        $this->extraCharges = [];

        return $this;
    }

    /**
     * @param ProductVariationValueI18n $i18n
     *
     * @return ProductVariationValue
     */
    public function addI18n(ProductVariationValueI18n $i18n): ProductVariationValue
    {
        $this->i18ns[] = $i18n;

        return $this;
    }

    /**
     * @return ProductVariationValueI18n[]
     */
    public function getI18ns(): array
    {
        return $this->i18ns;
    }

    /**
     * @param ProductVariationValueI18n ...$i18ns
     *
     * @return ProductVariationValue
     */
    public function setI18ns(ProductVariationValueI18n ...$i18ns): ProductVariationValue
    {
        $this->i18ns = $i18ns;

        return $this;
    }

    /**
     * @return ProductVariationValue
     */
    public function clearI18ns(): ProductVariationValue
    {
        $this->i18ns = [];

        return $this;
    }

    /**
     * @param ProductVariationValueInvisibility $invisibility
     *
     * @return ProductVariationValue
     */
    public function addInvisibility(
        ProductVariationValueInvisibility $invisibility
    ): ProductVariationValue {
        $this->invisibilities[] = $invisibility;

        return $this;
    }

    /**
     * @return ProductVariationValueInvisibility[]
     */
    public function getInvisibilities(): array
    {
        return $this->invisibilities;
    }

    /**
     * @param ProductVariationValueInvisibility[] $invisibilities
     *
     * @return ProductVariationValue
     */
    public function setInvisibilities(array $invisibilities): ProductVariationValue
    {
        $this->invisibilities = $invisibilities;

        return $this;
    }

    /**
     * @return ProductVariationValue
     */
    public function clearInvisibilities(): ProductVariationValue
    {
        $this->invisibilities = [];

        return $this;
    }
}
