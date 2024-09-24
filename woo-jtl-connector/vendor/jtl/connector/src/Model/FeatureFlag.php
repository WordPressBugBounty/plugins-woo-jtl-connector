<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Model;

class FeatureFlag
{
    public const
        CATEGORY_IMAGES_SUPPORTED                = 'category_images_supported',
        CONFIG_GROUP_IMAGES_SUPPORTED            = 'config_group_images_supported',
        DISABLE_STATISTICS                       = 'disable_statistics',
        FREE_FIELD_SUPPORTED                     = 'free_field_supported',
        MANUFACTURER_IMAGES_SUPPORTED            = 'manufacturer_images_supported',
        NEEDS_CATEGORY_ROOT                      = 'needs_category_root',
        PRODUCT_IMAGES_SUPPORTED                 = 'product_images_supported',
        PRODUCT_VARIATION_VALUE_IMAGES_SUPPORTED = 'product_variation_value_images_supported',
        SEND_ALL_ACKS                            = 'send_all_acks',
        SET_ARTICLES_SUPPORTED                   = 'set_articles_supported',
        SPECIFIC_IMAGES_SUPPORTED                = 'specific_images_supported',
        SPECIFIC_VALUE_IMAGES_SUPPORTED          = 'specific_value_images_supported',
        TRANSLATED_ATTRIBUTES_SUPPORTED          = 'translated_attributes_supported',
        VAR_COMBINATION_CHILD_FIRST              = 'var_combination_child_first',
        VARIATION_PRODUCTS_SUPPORTED             = 'variation_products_supported',
        VARIATION_COMBINATIONS_SUPPORTED         = 'variation_combinations_supported';

    /**
     * @var string
     */
    protected string $name = '';

    /**
     * @var boolean
     */
    protected bool $active = false;

    /**
     * FeatureFlag constructor.
     *
     * @param string  $name
     * @param boolean $active
     */
    public function __construct(string $name, bool $active = false)
    {
        $this->name   = $name;
        $this->active = $active;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return FeatureFlag
     */
    public function setName(string $name): FeatureFlag
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @param bool $active
     *
     * @return FeatureFlag
     */
    public function setActive(bool $active): FeatureFlag
    {
        $this->active = $active;
        return $this;
    }
}
