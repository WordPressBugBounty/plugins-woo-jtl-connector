<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Utilities\Validator;

use Jtl\Connector\Core\Exception\ArrayKeyDoesNotExistException;
use Jtl\Connector\Core\Exception\MethodDoesNotExistException;
use PHPStan\BetterReflection\Reflection\Exception\PropertyDoesNotExist;

class Validator implements ValidatorInterface
{
    /** @var mixed */
    private $value;
    private string $assertedType;

    /**
     * @inheritDoc
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @inheritDoc
     */
    public function string(): string
    {
        if (!\is_string($this->value)) {
            $this->assertedType = 'string';
            $this->throwException();
        }

        /** @var string $value */
        $value = $this->value;

        return $value;
    }

    /**
     * @inheritDoc
     */
    public function throwException(): void
    {
        $value   = \is_object($this->value) ? \get_class($this->value) : $this->value;
        $message = $this->hasValue()
            ? $value . ' must be type ' . $this->assertedType
            : 'Type Error: Value is null';

        throw new \TypeError($message);
    }

    /**
     * @inheritDoc
     */
    public function hasValue(): bool
    {
        return $this->value !== null;
    }

    /**
     * @inheritDoc
     */
    public function int(): int
    {
        if (!\is_int($this->value)) {
            $this->assertedType = 'int';
            $this->throwException();
        }

        /** @var int $value */
        $value = $this->value;

        return $value;
    }

    /**
     * @inheritDoc
     */
    public function float(): float
    {
        if (!\is_float($this->value)) {
            $this->assertedType = 'float';
            $this->throwException();
        }

        /** @var float $value */
        $value = $this->value;

        return $value;
    }

    /**
     * @inheritDoc
     */
    public function bool(): bool
    {
        if (!\is_bool($this->value)) {
            $this->assertedType = 'bool';
            $this->throwException();
        }

        /** @var bool $value */
        $value = $this->value;

        return $value;
    }

    /**
     * @inheritDoc
     */
    public function instanceOf(string $class): bool
    {
        if (!($this->value instanceof $class)) {
            $this->assertedType = $class;
            $this->throwException();
        }

        return true;
    }

    /**
     * @inheritDoc
     */
    public function hasProperty(string $propertyName): bool
    {
        $this->isObject();
        if (!isset($this->value->$propertyName)) {
            throw PropertyDoesNotExist::fromName($propertyName);
        }

        return true;
    }

    /**
     * @inheritDoc
     */
    public function isObject(): bool
    {
        if (!\is_object($this->value)) {
            $this->assertedType = 'object';
            $this->throwException();
        }

        return true;
    }

    /**
     * @param $keyName
     *
     * @return bool
     * @throws \InvalidArgumentException
     * @throws \TypeError
     * @throws ArrayKeyDoesNotExistException
     */
    public function hasKey($keyName): bool
    {
        $value = $this->array();
        $this->isValidArrayKeyName($keyName);
        if (!\array_key_exists($keyName, $value)) {
            throw ArrayKeyDoesNotExistException::fromKey($keyName);
        }

        return true;
    }

    /**
     * @inheritDoc
     */
    public function array(): array
    {
        if (!\is_array($this->value)) {
            $this->assertedType = 'array';
            $this->throwException();
        }

        /** @var array<mixed> $value */
        $value = $this->value;

        return $value;
    }

    /**
     * @inheritDoc
     */
    public function isValidArrayKeyName($keyName): bool
    {
        if (!((\is_string($keyName) && $keyName !== '') || (\is_int($keyName) && $keyName >= 0))) {
            throw new \InvalidArgumentException('$keyName must be a string or int equals 0 or greater.');
        }

        return true;
    }

    /**
     * @inheritDoc
     */
    public function hasMethod(string $methodName): bool
    {
        $this->isObject();
        /** @var object $value */
        $value = $this->value;
        if (!\method_exists($value, $methodName)) {
            throw MethodDoesNotExistException::fromName($methodName);
        }

        return true;
    }
}
