<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * Billing address of a customer (order)
 *
 * @access     public
 * @package    Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class CustomerOrderBillingAddress extends AbstractOrderAddress
{
    /**
     * @var string VAT number (german "USt-ID")
     * @Serializer\Type("string")
     * @Serializer\SerializedName("vatNumber")
     * @Serializer\Accessor(getter="getVatNumber",setter="setVatNumber")
     */
    protected string $vatNumber = '';

    /**
     * @return string VAT number (german "USt-ID")
     */
    public function getVatNumber(): string
    {
        return $this->vatNumber;
    }

    /**
     * @param string $vatNumber VAT number (german "USt-ID")
     *
     * @return CustomerOrderBillingAddress
     */
    public function setVatNumber(string $vatNumber): CustomerOrderBillingAddress
    {
        $this->vatNumber = $vatNumber;

        return $this;
    }
}
