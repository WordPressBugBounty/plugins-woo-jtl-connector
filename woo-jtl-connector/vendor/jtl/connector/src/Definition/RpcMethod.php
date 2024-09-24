<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Definition;

/**
 * Rpc Method Utilities
 *
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.de>
 */
final class RpcMethod
{
    public const
        ACK      = 'core.connector.ack',
        AUTH     = 'core.connector.auth',
        CLEAR    = 'core.linker.clear',
        INIT     = 'core.connector.init',
        FEATURES = 'core.connector.features',
        IDENTIFY = 'connector.identify',
        FINISH   = 'connector.finish';

    /** @var array<string, string> */
    protected static array $mappedMethods = [
        self::IDENTIFY            => 'core.connector.identify',
        self::FINISH              => 'core.connector.finish',
        self::CLEAR               => 'core.connector.clear',
        'CustomerOrder.statistic' => 'customer_order.statistic',
    ];

    /**
     * @param string $methodName
     *
     * @return boolean
     */
    public static function isMethod(string $methodName): bool
    {
        $pregcore = '';
        if (\strpos($methodName, 'core.') !== false) {
            $pregcore = 'core.';
        }

        return \preg_match("/{$pregcore}[a-z0-9]{3,}[.]{1}[a-z0-9]{3,}/", $methodName) === 1;
    }

    /**
     * @param string $method
     *
     * @return string
     */
    public static function mapMethod(string $method): string
    {
        return self::$mappedMethods[$method] ?? $method;
    }
}
