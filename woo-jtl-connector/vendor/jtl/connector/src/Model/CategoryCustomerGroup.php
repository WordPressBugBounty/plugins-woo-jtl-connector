<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * Link customergroup with category. Set optional discount on category for customergroup.
 *
 * @access     public
 * @package    Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class CategoryCustomerGroup extends AbstractModel
{
    /**
     * @var Identity Reference to customerGroup
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("customerGroupId")
     * @Serializer\Accessor(getter="getCustomerGroupId",setter="setCustomerGroupId")
     */
    protected Identity $customerGroupId;

    /**
     * @var double Optional discount on products in specified categoryId for  customerGroupId
     * @Serializer\Type("double")
     * @Serializer\SerializedName("discount")
     * @Serializer\Accessor(getter="getDiscount",setter="setDiscount")
     */
    protected float $discount = 0.0;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->customerGroupId = new Identity();
    }

    /**
     * @return Identity Reference to customerGroup
     */
    public function getCustomerGroupId(): Identity
    {
        return $this->customerGroupId;
    }

    /**
     * @param Identity $customerGroupId Reference to customerGroup
     *
     * @return CategoryCustomerGroup
     */
    public function setCustomerGroupId(Identity $customerGroupId): CategoryCustomerGroup
    {
        $this->customerGroupId = $customerGroupId;

        return $this;
    }

    /**
     * @return double Optional discount on products in specified categoryId for  customerGroupId
     */
    public function getDiscount(): float
    {
        return $this->discount;
    }

    /**
     * @param double $discount Optional discount on products in specified categoryId for  customerGroupId
     *
     * @return CategoryCustomerGroup
     */
    public function setDiscount(float $discount): CategoryCustomerGroup
    {
        $this->discount = $discount;

        return $this;
    }
}
