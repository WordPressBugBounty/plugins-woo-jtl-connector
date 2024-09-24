<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * Specific value properties to define a new specificValue with a sort number.
 *
 * @access     public
 * @package    Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class SpecificValue extends AbstractIdentity
{
    /**
     * @var integer Optional sort number
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("sort")
     * @Serializer\Accessor(getter="getSort",setter="setSort")
     */
    protected int $sort = 1;

    /**
     * @var SpecificValueI18n[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\SpecificValueI18n>")
     * @Serializer\SerializedName("i18ns")
     * @Serializer\AccessType("reflection")
     */
    protected array $i18ns = [];

    /**
     * @return integer Optional sort number
     */
    public function getSort(): int
    {
        return $this->sort;
    }

    /**
     * @param integer $sort Optional sort number
     *
     * @return SpecificValue
     */
    public function setSort(int $sort): SpecificValue
    {
        $this->sort = $sort;

        return $this;
    }

    /**
     * @param SpecificValueI18n $i18n
     *
     * @return SpecificValue
     */
    public function addI18n(SpecificValueI18n $i18n): SpecificValue
    {
        $this->i18ns[] = $i18n;

        return $this;
    }

    /**
     * @return SpecificValueI18n[]
     */
    public function getI18ns(): array
    {
        return $this->i18ns;
    }

    /**
     * @param SpecificValueI18n ...$i18ns
     *
     * @return SpecificValue
     */
    public function setI18ns(SpecificValueI18n ...$i18ns): SpecificValue
    {
        $this->i18ns = $i18ns;

        return $this;
    }

    /**
     * @return SpecificValue
     */
    public function clearI18ns(): SpecificValue
    {
        $this->i18ns = [];

        return $this;
    }
}
