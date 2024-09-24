<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;
use Jtl\Connector\Core\Exception\MustNotBeNullException;
use Jtl\Connector\Core\Utilities\Validator\Validate;
use TypeError;

/**
 * special price properties to define a net price for a customerGroup.
 *
 * @access     public
 * @package    Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class ProductSpecialPriceItem extends AbstractModel
{
    /**
     * @var Identity Reference to customerGroup
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("customerGroupId")
     * @Serializer\Accessor(getter="getCustomerGroupId",setter="setCustomerGroupId")
     */
    protected Identity $customerGroupId;

    /**
     * @var double net price value
     * @Serializer\Type("double")
     * @Serializer\SerializedName("priceNet")
     * @Serializer\Accessor(getter="getPriceNet",setter="setPriceNet")
     */
    protected float $priceNet = 0.0;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->customerGroupId = new Identity();
    }

    /**
     * @return Identity Reference to customerGroup
     * @throws MustNotBeNullException
     * @throws TypeError
     */
    public function getCustomerGroupId(): Identity
    {
        return Validate::checkIdentityAndNotNull($this->customerGroupId);
    }

    /**
     * @param Identity $customerGroupId Reference to customerGroup
     *
     * @return ProductSpecialPriceItem
     */
    public function setCustomerGroupId(Identity $customerGroupId): ProductSpecialPriceItem
    {
        $this->customerGroupId = $customerGroupId;

        return $this;
    }

    /**
     * @return double net price value
     */
    public function getPriceNet(): float
    {
        return $this->priceNet;
    }

    /**
     * @param double $priceNet net price value
     *
     * @return ProductSpecialPriceItem
     */
    public function setPriceNet(float $priceNet): ProductSpecialPriceItem
    {
        $this->priceNet = $priceNet;

        return $this;
    }
}
