<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;
use JsonException;
use Jtl\Connector\Core\Exception\TranslatableAttributeException;

/**
 * @access     public
 * @package    Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class TranslatableAttributeI18n extends AbstractI18n
{
    /**
     * @var bool
     * @Serializer\Exclude
     */
    protected static bool $strictMode = false;
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("name")
     * @Serializer\Accessor(getter="getName",setter="setName")
     */
    protected string $name = '';
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("value")
     * @Serializer\Accessor(getter="getValue",setter="setValue")
     */
    protected string $value = '';

    /**
     * @return bool
     */
    public static function isStrictMode(): bool
    {
        return self::$strictMode;
    }

    /**
     * @param bool $strictMode
     */
    public static function setStrictMode(bool $strictMode): void
    {
        self::$strictMode = $strictMode;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return TranslatableAttributeI18n
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param string $castToType
     *
     * @return bool|float|int|string|object
     * @throws TranslatableAttributeException
     */
    public function getValue(string $castToType = TranslatableAttribute::TYPE_STRING)
    {
        $value = $this->value;
        switch ($castToType) {
            case TranslatableAttribute::TYPE_BOOL:
                $value = !('false' === $this->value) && $this->value;
                break;

            case TranslatableAttribute::TYPE_INT:
                $value = (int)$this->value;
                break;

            case TranslatableAttribute::TYPE_JSON:
                /** @var object $value */
                /** @noinspection JsonEncodingApiUsageInspection */
                $value = \json_decode($value, true);
                if (self::$strictMode && \json_last_error() !== \JSON_ERROR_NONE) {
                    throw TranslatableAttributeException::decodingValueFailed($this->name, \json_last_error_msg());
                }
                break;

            case TranslatableAttribute::TYPE_FLOAT:
                $value = (float)$this->value;
                break;
        }

        return $value;
    }

    /**
     * @param mixed $value
     *
     * @return TranslatableAttributeI18n
     * @throws TranslatableAttributeException
     * @throws JsonException
     */
    public function setValue($value): self
    {
        $type = \gettype($value);

        if (!\in_array($type, ['array', 'object', 'boolean', 'integer', 'double', 'string'], true)) {
            throw TranslatableAttributeException::valueTypeInvalid($this->name, $type);
        }
        /** @var array<mixed>|object|bool|int|float|string $value */
        switch ($type) {
            case 'boolean':
                $this->value = $value === true ? '1' : '0';
                break;

            case 'array':
            case 'object':
                $this->value = \json_encode($value, \JSON_THROW_ON_ERROR);
                break;

            default:
                /** @var int|float|string $value */
                $this->value = (string)$value;
                break;
        }

        return $this;
    }
}
