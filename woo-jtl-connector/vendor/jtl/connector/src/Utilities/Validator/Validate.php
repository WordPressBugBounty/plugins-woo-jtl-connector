<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Utilities\Validator;

use Faker\Generator;
use InvalidArgumentException;
use Jtl\Connector\Core\Exception\MustNotBeNullException;
use Jtl\Connector\Core\Model\CategoryAttribute;
use Jtl\Connector\Core\Model\Identity;
use Jtl\Connector\Core\Rpc\RequestPacket;
use Jtl\Connector\Core\Rpc\ResponsePacket;
use TypeError;

class Validate
{
    /**
     * @param mixed $value
     *
     * @return string
     * @throws TypeError
     */
    public static function string($value): string
    {
        return self::initValidator($value)->string();
    }

    /**
     * @param mixed $value
     *
     * @return Validator
     */
    private static function initValidator($value): Validator
    {
        return new Validator($value);
    }

    /**
     * @param mixed $value
     *
     * @return ResponsePacket
     * @throws TypeError
     */
    public static function responsePacket($value): ResponsePacket
    {
        self::initValidator($value)->instanceOf(ResponsePacket::class);

        /** @var ResponsePacket $value */
        return $value;
    }

    /**
     * @param mixed $value
     *
     * @return RequestPacket
     * @throws TypeError
     */
    public static function requestPacket($value): RequestPacket
    {
        self::initValidator($value)->instanceOf(RequestPacket::class);

        /** @var RequestPacket $value */
        return $value;
    }

    /**
     * @param mixed $value
     *
     * @return object
     * @throws TypeError
     * @throws \RuntimeException
     * @throws InvalidArgumentException
     */
    public static function productObj($value): object
    {
        self::initValidator($value)->hasProperty('attributes');
        /** @var object $value */
        self::initValidator($value->attributes ?? null)->hasKey(0);

        return $value;
    }

    /**
     * @param mixed $value
     *
     * @return Identity
     * @throws MustNotBeNullException
     * @throws TypeError
     */
    public static function checkIdentityAndNotNull($value): Identity
    {
        if ($value === null) {
            throw MustNotBeNullException::fromExpectedType(Identity::class);
        }

        self::initValidator($value)->instanceOf(Identity::class);

        /** @var Identity $value */
        return $value;
    }

    /**
     * @param mixed $value
     *
     * @return \DateTimeInterface|null
     * @throws TypeError
     */
    public static function checkDateTimeInterfaceOrNull($value): ?\DateTimeInterface
    {
        if ($value === null) {
            return null;
        }
        self::initValidator($value)->instanceOf(\DateTimeInterface::class);

        /** @var \DateTimeInterface $value */
        return $value;
    }

    /**
     * @param mixed $value
     *
     * @return Generator
     * @throws MustNotBeNullException
     * @throws TypeError
     */
    public static function checkGeneratorAndNotNull($value): Generator
    {
        if ($value === null) {
            throw MustNotBeNullException::fromExpectedType(Generator::class);
        }

        self::initValidator($value)->instanceOf(Generator::class);

        /** @var Generator $value */
        return $value;
    }
}
