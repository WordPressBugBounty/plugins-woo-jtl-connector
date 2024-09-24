<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * Locale specific texts for product
 *
 * @access     public
 * @package    Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class ProductI18n extends AbstractI18n
{
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("deliveryStatus")
     * @Serializer\Accessor(getter="getDeliveryStatus",setter="setDeliveryStatus")
     */
    protected string $deliveryStatus = '';

    /**
     * @var string Optional product description
     * @Serializer\Type("string")
     * @Serializer\SerializedName("description")
     * @Serializer\Accessor(getter="getDescription",setter="setDescription")
     */
    protected string $description = '';

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("measurementUnitName")
     * @Serializer\Accessor(getter="getMeasurementUnitName",setter="setMeasurementUnitName")
     */
    protected string $measurementUnitName = '';

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("metaDescription")
     * @Serializer\Accessor(getter="getMetaDescription",setter="setMetaDescription")
     */
    protected string $metaDescription = '';

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("metaKeywords")
     * @Serializer\Accessor(getter="getMetaKeywords",setter="setMetaKeywords")
     */
    protected string $metaKeywords = '';

    /**
     * @var string Product name / title
     * @Serializer\Type("string")
     * @Serializer\SerializedName("name")
     * @Serializer\Accessor(getter="getName",setter="setName")
     */
    protected string $name = '';

    /**
     * @var string Optional product shortdescription
     * @Serializer\Type("string")
     * @Serializer\SerializedName("shortDescription")
     * @Serializer\Accessor(getter="getShortDescription",setter="setShortDescription")
     */
    protected string $shortDescription = '';

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("titleTag")
     * @Serializer\Accessor(getter="getTitleTag",setter="setTitleTag")
     */
    protected string $titleTag = '';

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("unitName")
     * @Serializer\Accessor(getter="getUnitName",setter="setUnitName")
     */
    protected string $unitName = '';

    /**
     * @var string Optional path of product URL
     * @Serializer\Type("string")
     * @Serializer\SerializedName("urlPath")
     * @Serializer\Accessor(getter="getUrlPath",setter="setUrlPath")
     */
    protected string $urlPath = '';

    /**
     * @return string
     */
    public function getDeliveryStatus(): string
    {
        return $this->deliveryStatus;
    }

    /**
     * @param string $deliveryStatus
     *
     * @return ProductI18n
     */
    public function setDeliveryStatus(string $deliveryStatus): ProductI18n
    {
        $this->deliveryStatus = $deliveryStatus;

        return $this;
    }

    /**
     * @return string Optional product description
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description Optional product description
     *
     * @return ProductI18n
     */
    public function setDescription(string $description): ProductI18n
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getMeasurementUnitName(): string
    {
        return $this->measurementUnitName;
    }

    /**
     * @param string $measurementUnitName
     *
     * @return ProductI18n
     */
    public function setMeasurementUnitName(string $measurementUnitName): ProductI18n
    {
        $this->measurementUnitName = $measurementUnitName;

        return $this;
    }

    /**
     * @return string
     */
    public function getMetaDescription(): string
    {
        return $this->metaDescription;
    }

    /**
     * @param string $metaDescription
     *
     * @return ProductI18n
     */
    public function setMetaDescription(string $metaDescription): ProductI18n
    {
        $this->metaDescription = $metaDescription;

        return $this;
    }

    /**
     * @return string
     */
    public function getMetaKeywords(): string
    {
        return $this->metaKeywords;
    }

    /**
     * @param string $metaKeywords
     *
     * @return ProductI18n
     */
    public function setMetaKeywords(string $metaKeywords): ProductI18n
    {
        $this->metaKeywords = $metaKeywords;

        return $this;
    }

    /**
     * @return string Product name / title
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name Product name / title
     *
     * @return ProductI18n
     */
    public function setName(string $name): ProductI18n
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string Optional product shortdescription
     */
    public function getShortDescription(): string
    {
        return $this->shortDescription;
    }

    /**
     * @param string $shortDescription Optional product shortdescription
     *
     * @return ProductI18n
     */
    public function setShortDescription(string $shortDescription): ProductI18n
    {
        $this->shortDescription = $shortDescription;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitleTag(): string
    {
        return $this->titleTag;
    }

    /**
     * @param string $titleTag
     *
     * @return ProductI18n
     */
    public function setTitleTag(string $titleTag): ProductI18n
    {
        $this->titleTag = $titleTag;

        return $this;
    }

    /**
     * @return string
     */
    public function getUnitName(): string
    {
        return $this->unitName;
    }

    /**
     * @param string $unitName
     *
     * @return ProductI18n
     */
    public function setUnitName(string $unitName): ProductI18n
    {
        $this->unitName = $unitName;

        return $this;
    }

    /**
     * @return string Optional path of product URL
     */
    public function getUrlPath(): string
    {
        return $this->urlPath;
    }

    /**
     * @param string $urlPath Optional path of product URL
     *
     * @return ProductI18n
     */
    public function setUrlPath(string $urlPath): ProductI18n
    {
        $this->urlPath = $urlPath;

        return $this;
    }
}
