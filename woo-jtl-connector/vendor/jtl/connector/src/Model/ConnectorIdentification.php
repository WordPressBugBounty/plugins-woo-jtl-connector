<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * @access     public
 * @package    Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class ConnectorIdentification extends AbstractModel
{
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("endpointVersion")
     * @Serializer\Accessor(getter="getEndpointVersion",setter="setEndpointVersion")
     */
    protected string $endpointVersion = '';

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("platformName")
     * @Serializer\Accessor(getter="getPlatformName",setter="setPlatformName")
     */
    protected string $platformName = '';

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("platformVersion")
     * @Serializer\Accessor(getter="getPlatformVersion",setter="setPlatformVersion")
     */
    protected string $platformVersion = '';

    /**
     * @var integer
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("protocolVersion")
     * @Serializer\Accessor(getter="getProtocolVersion",setter="setProtocolVersion")
     */
    protected int $protocolVersion = 0;

    /**
     * @var ConnectorServerInfo|null
     * @Serializer\Type("Jtl\Connector\Core\Model\ConnectorServerInfo")
     * @Serializer\SerializedName("serverInfo")
     * @Serializer\Accessor(getter="getServerInfo",setter="setServerInfo")
     */
    protected ?ConnectorServerInfo $serverInfo = null;

    /**
     * @return string
     */
    public function getEndpointVersion(): string
    {
        return $this->endpointVersion;
    }

    /**
     * @param string $endpointVersion
     *
     * @return ConnectorIdentification
     */
    public function setEndpointVersion(string $endpointVersion): ConnectorIdentification
    {
        $this->endpointVersion = $endpointVersion;

        return $this;
    }

    /**
     * @return string
     */
    public function getPlatformName(): string
    {
        return $this->platformName;
    }

    /**
     * @param string $platformName
     *
     * @return ConnectorIdentification
     */
    public function setPlatformName(string $platformName): ConnectorIdentification
    {
        $this->platformName = $platformName;

        return $this;
    }

    /**
     * @return string
     */
    public function getPlatformVersion(): string
    {
        return $this->platformVersion;
    }

    /**
     * @param string $platformVersion
     *
     * @return ConnectorIdentification
     */
    public function setPlatformVersion(string $platformVersion): ConnectorIdentification
    {
        $this->platformVersion = $platformVersion;

        return $this;
    }

    /**
     * @return integer
     */
    public function getProtocolVersion(): int
    {
        return $this->protocolVersion;
    }

    /**
     * @param integer $protocolVersion
     *
     * @return ConnectorIdentification
     */
    public function setProtocolVersion(int $protocolVersion): ConnectorIdentification
    {
        $this->protocolVersion = $protocolVersion;

        return $this;
    }

    /**
     * @return ConnectorServerInfo
     */
    public function getServerInfo(): ?ConnectorServerInfo
    {
        return $this->serverInfo;
    }

    /**
     * @param ConnectorServerInfo $connectorServerInfo
     *
     * @return ConnectorIdentification
     */
    public function setServerInfo(ConnectorServerInfo $connectorServerInfo): ConnectorIdentification
    {
        $this->serverInfo = $connectorServerInfo;

        return $this;
    }
}
