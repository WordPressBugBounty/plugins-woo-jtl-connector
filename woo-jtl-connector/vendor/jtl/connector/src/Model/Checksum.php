<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;
use Jtl\Connector\Core\Checksum\ChecksumInterface;

/**
 * @access     public
 * @package    Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class Checksum extends AbstractModel implements ChecksumInterface
{
    /**
     * @var int - Checksum used to check variations for change
     */
    public const TYPE_VARIATION = 1;

    /**
     * @var Identity
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("foreignKey")
     * @Serializer\Accessor(getter="getForeignKey",setter="setForeignKey")
     */
    protected Identity $foreignKey;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("endpoint")
     * @Serializer\Accessor(getter="getEndpoint",setter="setEndpoint")
     */
    protected string $endpoint = '';

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("hasChanged")
     * @Serializer\Accessor(getter="getHasChanged",setter="setHasChanged")
     */
    protected bool $hasChanged = false;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("host")
     * @Serializer\Accessor(getter="getHost",setter="setHost")
     */
    protected string $host = '';

    /**
     * @var integer
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("type")
     * @Serializer\Accessor(getter="getType",setter="setType")
     */
    protected int $type = 0;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->foreignKey = new Identity();
    }

    /**
     * @return Identity
     */
    public function getForeignKey(): Identity
    {
        return $this->foreignKey;
    }

    /**
     * @param Identity $foreignKey
     *
     * @return Checksum
     */
    public function setForeignKey(Identity $foreignKey): Checksum
    {
        $this->foreignKey = $foreignKey;

        return $this;
    }

    /**
     * @return string
     */
    public function getEndpoint(): string
    {
        return $this->endpoint;
    }

    /**
     * @param string $endpoint
     *
     * @return Checksum
     */
    public function setEndpoint(string $endpoint): Checksum
    {
        $this->endpoint = $endpoint;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getHasChanged(): bool
    {
        return $this->hasChanged;
    }

    /**
     * @param boolean $hasChanged
     *
     * @return Checksum
     */
    public function setHasChanged(bool $hasChanged): Checksum
    {
        $this->hasChanged = $hasChanged;

        return $this;
    }

    /**
     * @return boolean
     */
    public function hasChanged(): bool
    {
        return $this->hasChanged;
    }

    /**
     * @return string
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * @param string $host
     *
     * @return Checksum
     */
    public function setHost(string $host): Checksum
    {
        $this->host = $host;

        return $this;
    }

    /**
     * @return integer
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @param integer $type
     *
     * @return Checksum
     */
    public function setType(int $type): Checksum
    {
        $this->type = $type;

        return $this;
    }
}
