<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * Localized specific value text.
 *
 * @access     public
 * @package    Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class SpecificValueI18n extends AbstractI18n
{
    /**
     * @var string Optional localized description
     * @Serializer\Type("string")
     * @Serializer\SerializedName("description")
     * @Serializer\Accessor(getter="getDescription",setter="setDescription")
     */
    protected string $description = '';

    /**
     * @var string Optional localized meta description value
     * @Serializer\Type("string")
     * @Serializer\SerializedName("metaDescription")
     * @Serializer\Accessor(getter="getMetaDescription",setter="setMetaDescription")
     */
    protected string $metaDescription = '';

    /**
     * @var string Optional localized meta keywords value
     * @Serializer\Type("string")
     * @Serializer\SerializedName("metaKeywords")
     * @Serializer\Accessor(getter="getMetaKeywords",setter="setMetaKeywords")
     */
    protected string $metaKeywords = '';

    /**
     * @var string Optional localized title tag value
     * @Serializer\Type("string")
     * @Serializer\SerializedName("titleTag")
     * @Serializer\Accessor(getter="getTitleTag",setter="setTitleTag")
     */
    protected string $titleTag = '';

    /**
     * @var string Optional localized URL path
     * @Serializer\Type("string")
     * @Serializer\SerializedName("urlPath")
     * @Serializer\Accessor(getter="getUrlPath",setter="setUrlPath")
     */
    protected string $urlPath = '';

    /**
     * @var string Localized value
     * @Serializer\Type("string")
     * @Serializer\SerializedName("value")
     * @Serializer\Accessor(getter="getValue",setter="setValue")
     */
    protected string $value = '';

    /**
     * @return string Optional localized description
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description Optional localized description
     *
     * @return SpecificValueI18n
     */
    public function setDescription(string $description): SpecificValueI18n
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string Optional localized meta description value
     */
    public function getMetaDescription(): string
    {
        return $this->metaDescription;
    }

    /**
     * @param string $metaDescription Optional localized meta description value
     *
     * @return SpecificValueI18n
     */
    public function setMetaDescription(string $metaDescription): SpecificValueI18n
    {
        $this->metaDescription = $metaDescription;

        return $this;
    }

    /**
     * @return string Optional localized meta keywords value
     */
    public function getMetaKeywords(): string
    {
        return $this->metaKeywords;
    }

    /**
     * @param string $metaKeywords Optional localized meta keywords value
     *
     * @return SpecificValueI18n
     */
    public function setMetaKeywords(string $metaKeywords): SpecificValueI18n
    {
        $this->metaKeywords = $metaKeywords;

        return $this;
    }

    /**
     * @return string Optional localized title tag value
     */
    public function getTitleTag(): string
    {
        return $this->titleTag;
    }

    /**
     * @param string $titleTag Optional localized title tag value
     *
     * @return SpecificValueI18n
     */
    public function setTitleTag(string $titleTag): SpecificValueI18n
    {
        $this->titleTag = $titleTag;

        return $this;
    }

    /**
     * @return string Optional localized URL path
     */
    public function getUrlPath(): string
    {
        return $this->urlPath;
    }

    /**
     * @param string $urlPath Optional localized URL path
     *
     * @return SpecificValueI18n
     */
    public function setUrlPath(string $urlPath): SpecificValueI18n
    {
        $this->urlPath = $urlPath;

        return $this;
    }

    /**
     * @return string Localized value
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value Localized value
     *
     * @return SpecificValueI18n
     */
    public function setValue(string $value): SpecificValueI18n
    {
        $this->value = $value;

        return $this;
    }
}
