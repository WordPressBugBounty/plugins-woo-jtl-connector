<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Exception;

/**
 * HTTP Exception Class
 *
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.de>
 */
class HttpException extends \Exception
{
    public const UNKNOWN_METHOD = 10;

    /**
     * @param string $method
     *
     * @return HttpException
     */
    public static function unknownMethod(string $method): HttpException
    {
        return new self("Unknown method ({$method})", self::UNKNOWN_METHOD);
    }
}
