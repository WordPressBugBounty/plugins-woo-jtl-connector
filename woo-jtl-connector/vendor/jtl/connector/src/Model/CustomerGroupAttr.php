<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * Monolingual customer group attribute.
 *
 * @access     public
 * @package    Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class CustomerGroupAttr extends KeyValueAttribute implements IdentityInterface
{
    /**
     * @var Identity Unique customerGroupAttr id
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected Identity $id;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->id = new Identity();
    }

    /**
     * @return Identity Unique customerGroupAttr id
     */
    public function getId(): Identity
    {
        return $this->id;
    }

    /**
     * @param Identity $id Unique customerGroupAttr id
     *
     * @return CustomerGroupAttr
     */
    public function setId(Identity $id): CustomerGroupAttr
    {
        $this->id = $id;

        return $this;
    }
}
