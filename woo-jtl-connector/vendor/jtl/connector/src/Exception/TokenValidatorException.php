<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Exception;

/**
 * Class ConnectorException
 *
 * @package Jtl\Connector\Core\Exception
 */
class TokenValidatorException extends \Exception
{
    public const EMPTY_TOKEN = 10;

    /**
     * @return TokenValidatorException
     */
    public static function emptyToken(): TokenValidatorException
    {
        return new self('Connector token cannot be empty', self::EMPTY_TOKEN);
    }
}
