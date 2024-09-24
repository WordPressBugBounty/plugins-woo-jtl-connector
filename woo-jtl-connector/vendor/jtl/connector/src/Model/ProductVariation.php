<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * ProductVariation Model. Each product defines its own variations,
 * that means  variations are not global  in contrast to specifics.
 *
 * @access     public
 * @package    Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class ProductVariation extends AbstractIdentity
{
    /**
     * @var string - Multiple values displayed as radio buttons.
     */
    public const TYPE_RADIO = 'radio';
    /**
     * @var string - Multiple values displayed as drop down.
     */
    public const TYPE_SELECT = 'select';
    /**
     * @var string - boxes showing a text
     */
    public const TYPE_TEXTBOX = 'textbox';
    /**
     * @var string - Optional text input (no values)
     */
    public const TYPE_FREE_TEXT = 'freetext';
    /**
     * @var string - Required text input (no values)
     */
    public const TYPE_FREE_TEXT_OBLIGATORY = 'obligatory_freetext';
    /**
     * @var string - boxes showing a color
     */
    public const TYPE_IMAGE_SWATCHES = 'image_swatches';

    /**
     * @var integer Optional sort number
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("sort")
     * @Serializer\Accessor(getter="getSort",setter="setSort")
     */
    protected int $sort = 0;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("type")
     * @Serializer\Accessor(getter="getType",setter="setType")
     */
    protected string $type = '';

    /**
     * @var ProductVariationI18n[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\ProductVariationI18n>")
     * @Serializer\SerializedName("i18ns")
     * @Serializer\AccessType("reflection")
     */
    protected array $i18ns = [];

    /**
     * @var ProductVariationInvisibility[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\ProductVariationInvisibility>")
     * @Serializer\SerializedName("invisibilities")
     * @Serializer\AccessType("reflection")
     */
    protected array $invisibilities = [];

    /**
     * @var ProductVariationValue[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\ProductVariationValue>")
     * @Serializer\SerializedName("values")
     * @Serializer\AccessType("reflection")
     */
    protected array $values = [];

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
     * @return ProductVariation
     */
    public function setSort(int $sort): ProductVariation
    {
        $this->sort = $sort;

        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @return ProductVariation
     */
    public function setType(string $type): ProductVariation
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @param ProductVariationI18n $i18n
     *
     * @return ProductVariation
     */
    public function addI18n(ProductVariationI18n $i18n): ProductVariation
    {
        $this->i18ns[] = $i18n;

        return $this;
    }

    /**
     * @return ProductVariationI18n[]
     */
    public function getI18ns(): array
    {
        return $this->i18ns;
    }

    /**
     * @param ProductVariationI18n ...$i18ns
     *
     * @return ProductVariation
     */
    public function setI18ns(ProductVariationI18n ...$i18ns): ProductVariation
    {
        $this->i18ns = $i18ns;

        return $this;
    }

    /**
     * @return ProductVariation
     */
    public function clearI18ns(): ProductVariation
    {
        $this->i18ns = [];

        return $this;
    }

    /**
     * @param ProductVariationInvisibility $invisibility
     *
     * @return ProductVariation
     */
    public function addInvisibility(ProductVariationInvisibility $invisibility): ProductVariation
    {
        $this->invisibilities[] = $invisibility;

        return $this;
    }

    /**
     * @return ProductVariationInvisibility[]
     */
    public function getInvisibilities(): array
    {
        return $this->invisibilities;
    }

    /**
     * @param ProductVariationInvisibility ...$invisibilities
     *
     * @return ProductVariation
     */
    public function setInvisibilities(ProductVariationInvisibility ...$invisibilities): ProductVariation
    {
        $this->invisibilities = $invisibilities;

        return $this;
    }

    /**
     * @return ProductVariation
     */
    public function clearInvisibilities(): ProductVariation
    {
        $this->invisibilities = [];

        return $this;
    }

    /**
     * @param ProductVariationValue $value
     *
     * @return ProductVariation
     */
    public function addValue(ProductVariationValue $value): ProductVariation
    {
        $this->values[] = $value;

        return $this;
    }

    /**
     * @return ProductVariationValue[]
     */
    public function getValues(): array
    {
        return $this->values;
    }

    /**
     * @param ProductVariationValue ...$values
     *
     * @return ProductVariation
     */
    public function setValues(ProductVariationValue ...$values): ProductVariation
    {
        $this->values = $values;

        return $this;
    }

    /**
     * @return ProductVariation
     */
    public function clearValues(): ProductVariation
    {
        $this->values = [];

        return $this;
    }
}
