<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;
use Jtl\Connector\Core\Exception\MustNotBeNullException;
use Jtl\Connector\Core\Utilities\Validator\Validate;
use TypeError;

/**
 * @access     public
 * @package    Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class ProductChecksum extends Checksum
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
     * @Serializer\Accessor(getter="hasChanged",setter="setHasChanged")
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
    protected int $type = self::TYPE_VARIATION;

    /**
     * @return Identity
     * @throws MustNotBeNullException
     * @throws TypeError
     */
    public function getForeignKey(): Identity
    {
        return Validate::checkIdentityAndNotNull($this->foreignKey);
    }

    /**
     * @param Identity $foreignKey
     *
     * @return ProductChecksum
     */
    public function setForeignKey(Identity $foreignKey): ProductChecksum
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
     * @return ProductChecksum
     */
    public function setEndpoint(string $endpoint): ProductChecksum
    {
        $this->endpoint = $endpoint;

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
     * @return boolean
     */
    public function getHasChanged(): bool
    {
        return $this->hasChanged;
    }

    /**
     * @param boolean $hasChanged
     *
     * @return ProductChecksum
     */
    public function setHasChanged(bool $hasChanged): ProductChecksum
    {
        $this->hasChanged = $hasChanged;

        return $this;
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
     * @return ProductChecksum
     */
    public function setHost(string $host): ProductChecksum
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
     * @return ProductChecksum
     */
    public function setType(int $type): ProductChecksum
    {
        $this->type = $type;

        return $this;
    }
}
