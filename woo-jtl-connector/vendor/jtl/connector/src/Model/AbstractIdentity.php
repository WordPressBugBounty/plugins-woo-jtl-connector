<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;

abstract class AbstractIdentity extends AbstractModel implements IdentityInterface
{
    /**
     * @var Identity Unique id
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected Identity $id;

    /**
     * AbstractIdentity constructor.
     *
     * @param string $endpoint
     * @param int    $host
     */
    public function __construct(string $endpoint = '', int $host = 0)
    {
        $this->id = new Identity($endpoint, $host);
    }

    /**
     * @return Identity Unique id
     */
    public function getId(): Identity
    {
        return $this->id;
    }

    /**
     * @param Identity $id Unique id
     *
     * @return $this
     */
    public function setId(Identity $id): self
    {
        $this->id = $id;

        return $this;
    }
}
