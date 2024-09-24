<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * Customer group model.
 *
 * @access     public
 * @package    Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class CustomerGroup extends AbstractIdentity
{
    /**
     * @var boolean Optional: Show net prices default instead of gross prices
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("applyNetPrice")
     * @Serializer\Accessor(getter="getApplyNetPrice",setter="setApplyNetPrice")
     */
    protected bool $applyNetPrice = false;

    /**
     * @var double Optional percentual discount on all products. Negative Value means surcharge.
     * @Serializer\Type("double")
     * @Serializer\SerializedName("discount")
     * @Serializer\Accessor(getter="getDiscount",setter="setDiscount")
     */
    protected float $discount = 0.0;

    /**
     * @var boolean Optional: Flag default customer group
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("isDefault")
     * @Serializer\Accessor(getter="getIsDefault",setter="setIsDefault")
     */
    protected bool $isDefault = false;

    /**
     * @var CustomerGroupAttr[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\CustomerGroupAttr>")
     * @Serializer\SerializedName("attributes")
     * @Serializer\AccessType("reflection")
     */
    protected array $attributes = [];

    /**
     * @var CustomerGroupI18n[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\CustomerGroupI18n>")
     * @Serializer\SerializedName("i18ns")
     * @Serializer\AccessType("reflection")
     */
    protected array $i18ns = [];

    /**
     * @return boolean Optional: Show net prices default instead of gross prices
     */
    public function getApplyNetPrice(): bool
    {
        return $this->applyNetPrice;
    }

    /**
     * @param boolean $applyNetPrice Optional: Show net prices default instead of gross prices
     *
     * @return CustomerGroup
     */
    public function setApplyNetPrice(bool $applyNetPrice): self
    {
        $this->applyNetPrice = $applyNetPrice;

        return $this;
    }

    /**
     * @return double Optional percentual discount on all products. Negative Value means surcharge.
     */
    public function getDiscount(): float
    {
        return $this->discount;
    }

    /**
     * @param double $discount Optional percentual discount on all products. Negative Value means surcharge.
     *
     * @return CustomerGroup
     */
    public function setDiscount(float $discount): self
    {
        $this->discount = $discount;

        return $this;
    }

    /**
     * @return boolean Optional: Flag default customer group
     */
    public function getIsDefault(): bool
    {
        return $this->isDefault;
    }

    /**
     * @param boolean $isDefault Optional: Flag default customer group
     *
     * @return CustomerGroup
     */
    public function setIsDefault(bool $isDefault): self
    {
        $this->isDefault = $isDefault;

        return $this;
    }

    /**
     * @param CustomerGroupAttr $attribute
     *
     * @return CustomerGroup
     */
    public function addAttribute(CustomerGroupAttr $attribute): self
    {
        $this->attributes[] = $attribute;

        return $this;
    }

    /**
     * @return CustomerGroupAttr[]
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

    /**
     * @param CustomerGroupAttr ...$attributes
     *
     * @return CustomerGroup
     */
    public function setAttributes(CustomerGroupAttr ...$attributes): self
    {
        $this->attributes = $attributes;

        return $this;
    }

    /**
     * @return CustomerGroup
     */
    public function clearAttributes(): self
    {
        $this->attributes = [];

        return $this;
    }

    /**
     * @param CustomerGroupI18n $i18n
     *
     * @return CustomerGroup
     */
    public function addI18n(CustomerGroupI18n $i18n): self
    {
        $this->i18ns[] = $i18n;

        return $this;
    }

    /**
     * @return CustomerGroup
     */
    public function clearI18ns(): self
    {
        $this->i18ns = [];

        return $this;
    }

    /**
     * @return string[]
     */
    public function getIdentificationStrings(): array
    {
        $this->unsetIdentificationStringBySubject('name');
        foreach ($this->getI18ns() as $i18n) {
            if ($i18n->getName() !== '') {
                $this->setIdentificationStringBySubject('name', \sprintf('Name = %s', $i18n->getName()));
                break;
            }
        }

        return parent::getIdentificationStrings();
    }

    /**
     * @return CustomerGroupI18n[]
     */
    public function getI18ns(): array
    {
        return $this->i18ns;
    }

    /**
     * @param CustomerGroupI18n ...$i18ns
     *
     * @return CustomerGroup
     */
    public function setI18ns(CustomerGroupI18n ...$i18ns): self
    {
        $this->i18ns = $i18ns;

        return $this;
    }
}
