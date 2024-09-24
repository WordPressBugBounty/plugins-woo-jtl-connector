<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Config;

use Jtl\Connector\Core\Exception\ConfigException;
use Noodlehaus\ConfigInterface;

interface CoreConfigInterface extends ConfigInterface
{
    /**
     * @param string    $valueName
     * @param bool|null $default
     *
     * @return bool
     * @throws \TypeError
     * @throws ConfigException
     */
    public function getBool(string $valueName, ?bool $default = null): bool;

    /**
     * @param string      $valueName
     * @param string|null $default
     *
     * @return string
     * @throws ConfigException
     * @throws \TypeError
     */
    public function getString(string $valueName, ?string $default = null): string;

    /**
     * @return ConfigSchema
     */
    public function getConfigSchema(): ConfigSchema;

    /**
     * @param ConfigSchema $configSchema
     *
     * @return $this
     */
    public function setConfigSchema(ConfigSchema $configSchema): self;
}
