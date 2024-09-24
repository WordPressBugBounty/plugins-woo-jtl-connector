<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * Specifies product units like "ml", "l", " cm".
 *
 * @access     public
 * @package    Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class MeasurementUnit extends AbstractIdentity
{
    /**
     * @var string Optional UCUM-Code, see  http://unitsofmeasure.org/
     * @Serializer\Type("string")
     * @Serializer\SerializedName("code")
     * @Serializer\Accessor(getter="getCode",setter="setCode")
     */
    protected string $code = '';

    /**
     * @var string Synonym e.g. 'ml'
     * @Serializer\Type("string")
     * @Serializer\SerializedName("displayCode")
     * @Serializer\Accessor(getter="getDisplayCode",setter="setDisplayCode")
     */
    protected string $displayCode = '';

    /**
     * @var MeasurementUnitI18n[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\MeasurementUnitI18n>")
     * @Serializer\SerializedName("i18ns")
     * @Serializer\AccessType("reflection")
     */
    protected array $i18ns = [];

    /**
     * @return string Optional UCUM-Code, see  http://unitsofmeasure.org/
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code Optional UCUM-Code, see  http://unitsofmeasure.org/
     *
     * @return MeasurementUnit
     */
    public function setCode(string $code): MeasurementUnit
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return string Synonym e.g. 'ml'
     */
    public function getDisplayCode(): string
    {
        return $this->displayCode;
    }

    /**
     * @param string $displayCode Synonym e.g. 'ml'
     *
     * @return MeasurementUnit
     */
    public function setDisplayCode(string $displayCode): MeasurementUnit
    {
        $this->displayCode = $displayCode;

        return $this;
    }

    /**
     * @param MeasurementUnitI18n $i18n
     *
     * @return MeasurementUnit
     */
    public function addI18n(MeasurementUnitI18n $i18n): MeasurementUnit
    {
        $this->i18ns[] = $i18n;

        return $this;
    }

    /**
     * @return MeasurementUnitI18n[]
     */
    public function getI18ns(): array
    {
        return $this->i18ns;
    }

    /**
     * @param MeasurementUnitI18n ...$i18ns
     *
     * @return MeasurementUnit
     */
    public function setI18ns(MeasurementUnitI18n ...$i18ns): MeasurementUnit
    {
        $this->i18ns = $i18ns;

        return $this;
    }

    /**
     * @return MeasurementUnit
     */
    public function clearI18ns(): MeasurementUnit
    {
        $this->i18ns = [];

        return $this;
    }
}
