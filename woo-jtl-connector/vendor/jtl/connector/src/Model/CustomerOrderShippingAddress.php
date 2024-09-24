<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * Shipping Address properties of a customer (order)
 *
 * @access     public
 * @package    Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class CustomerOrderShippingAddress extends AbstractOrderAddress
{
    /**
     * @var Identity Reference to customer
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("customerId")
     * @Serializer\Accessor(getter="getCustomerId",setter="setCustomerId")
     */
    protected Identity $customerId;

    public function __construct(string $endpoint = '', int $host = 0)
    {
        parent::__construct($endpoint, $host);
        $this->customerId = new Identity();
    }

    /**
     * @return Identity Reference to customer
     */
    public function getCustomerId(): Identity
    {
        return $this->customerId;
    }

    /**
     * @param Identity $customerId Reference to customer
     *
     * @return CustomerOrderShippingAddress
     */
    public function setCustomerId(Identity $customerId): CustomerOrderShippingAddress
    {
        $this->customerId = $customerId;

        return $this;
    }
}
