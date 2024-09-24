<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;
use Jtl\Connector\Core\Exception\MustNotBeNullException;
use Jtl\Connector\Core\Utilities\Validator\Validate;

/**
 * Extra charge for productVariationValue per customerGroup.
 *
 * @access     public
 * @package    Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class ProductVariationValueExtraCharge extends AbstractModel
{
    /**
     * @var Identity Reference to customerGroup
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("customerGroupId")
     * @Serializer\Accessor(getter="getCustomerGroupId",setter="setCustomerGroupId")
     */
    protected Identity $customerGroupId;

    /**
     * @var double Extra charge (net)
     * @Serializer\Type("double")
     * @Serializer\SerializedName("extraChargeNet")
     * @Serializer\Accessor(getter="getExtraChargeNet",setter="setExtraChargeNet")
     */
    protected float $extraChargeNet = 0.0;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->customerGroupId = new Identity();
    }

    /**
     * @return Identity Reference to customerGroup
     * @throws MustNotBeNullException|\TypeError
     */
    public function getCustomerGroupId(): Identity
    {
        return Validate::checkIdentityAndNotNull($this->customerGroupId);
    }

    /**
     * @param Identity $customerGroupId Reference to customerGroup
     *
     * @return ProductVariationValueExtraCharge
     */
    public function setCustomerGroupId(Identity $customerGroupId): ProductVariationValueExtraCharge
    {
        $this->customerGroupId = $customerGroupId;

        return $this;
    }

    /**
     * @return double Extra charge (net)
     */
    public function getExtraChargeNet(): float
    {
        return $this->extraChargeNet;
    }

    /**
     * @param double $extraChargeNet Extra charge (net)
     *
     * @return ProductVariationValueExtraCharge
     */
    public function setExtraChargeNet(float $extraChargeNet): ProductVariationValueExtraCharge
    {
        $this->extraChargeNet = $extraChargeNet;

        return $this;
    }
}
