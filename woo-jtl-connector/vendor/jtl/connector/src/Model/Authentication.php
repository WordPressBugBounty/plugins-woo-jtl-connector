<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\AccessType("public_method")
 */
class Authentication extends AbstractModel
{
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("token")
     * @Serializer\Accessor(getter="getToken",setter="setToken")
     */
    protected string $token = '';

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @param string $token
     *
     * @return Authentication
     */
    public function setToken(string $token): Authentication
    {
        $this->token = $token;
        return $this;
    }
}
