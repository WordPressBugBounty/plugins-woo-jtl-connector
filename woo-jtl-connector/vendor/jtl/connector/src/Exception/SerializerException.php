<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Exception;

class SerializerException extends \Exception
{
    public const WRONG_ENDPOINT_FORMAT = 10;

    /**
     * @param string $endpoint
     *
     * @return SerializerException
     */
    public static function wrongEndpointFormat(string $endpoint): SerializerException
    {
        return new self(\sprintf('Endpoint "%s" has the wrong format', $endpoint), self::WRONG_ENDPOINT_FORMAT);
    }
}
