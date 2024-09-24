<?php

declare(strict_types=1);

namespace MyPlugin;

use DI\Container;
use Jtl\Connector\Core\Plugin\PluginInterface;
use Noodlehaus\ConfigInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;

class Bootstrap implements PluginInterface
{
    public function registerListener(
        ConfigInterface $config,
        Container       $container,
        EventDispatcher $eventDispatcher
    ): void {
        // TODO: Implement registerListener() method.
    }
}
