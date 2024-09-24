<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class Session
 *
 * @package Jtl\Connector\Core\Model
 * @Serializer\AccessType("public_method")
 */
class Session extends AbstractModel
{
    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\SerializedName("sessionId")
     * @Serializer\Accessor(getter="getSessionId",setter="setSessionId")
     */
    protected ?string $sessionId = null;

    /**
     * @var integer
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("lifetime")
     * @Serializer\Accessor(getter="getLifetime",setter="setLifetime")
     */
    protected int $lifetime = 0;

    /**
     * @return string
     */
    public function getSessionId(): ?string
    {
        return $this->sessionId;
    }

    /**
     * @param string $sessionId
     *
     * @return Session
     */
    public function setSessionId(string $sessionId): Session
    {
        $this->sessionId = $sessionId;
        return $this;
    }

    /**
     * @return int
     */
    public function getLifetime(): int
    {
        return $this->lifetime;
    }

    /**
     * @param int $lifetime
     *
     * @return Session
     */
    public function setLifetime(int $lifetime): Session
    {
        $this->lifetime = $lifetime;
        return $this;
    }
}
