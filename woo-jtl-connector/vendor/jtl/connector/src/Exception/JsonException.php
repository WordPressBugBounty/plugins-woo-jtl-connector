<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Exception;

class JsonException extends \RuntimeException
{
    public const ENCODING_ERROR = 10;
    public const DECODING_ERROR = 20;

    /**
     * @param string $lastErrorMessage
     *
     * @return JsonException
     */
    public static function encoding($lastErrorMessage): JsonException
    {
        return new self(\sprintf('Error while encoding into JSON: %s', $lastErrorMessage), static::ENCODING_ERROR);
    }

    /**
     * @param string $lastErrorMessage
     * @param string $jsonString |null
     *
     * @return JsonException
     */
    public static function decoding($lastErrorMessage, $jsonString = null): JsonException
    {
        $msg = \sprintf('Error while decoding JSON: %s', $lastErrorMessage);
        if (!\is_null($jsonString)) {
            $msg = \sprintf('Error while decoding JSON: %s' . \PHP_EOL . 'String: %s', $lastErrorMessage, $jsonString);
        }
        return new self($msg, static::DECODING_ERROR);
    }
}
