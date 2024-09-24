<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * Localized cross selling group. Can hold several crossSelling items that are linked for cross selling purposes.
 *
 * @access     public
 * @package    Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class CrossSellingGroup extends AbstractIdentity
{
    /**
     * @var CrossSellingGroupI18n[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\CrossSellingGroupI18n>")
     * @Serializer\SerializedName("i18ns")
     * @Serializer\AccessType("reflection")
     */
    protected array $i18ns = [];

    /**
     * @param CrossSellingGroupI18n $i18n
     *
     * @return CrossSellingGroup
     */
    public function addI18n(CrossSellingGroupI18n $i18n): CrossSellingGroup
    {
        $this->i18ns[] = $i18n;

        return $this;
    }

    /**
     * @return CrossSellingGroupI18n[]
     */
    public function getI18ns(): array
    {
        return $this->i18ns;
    }

    /**
     * @param CrossSellingGroupI18n ...$i18ns
     *
     * @return CrossSellingGroup
     */
    public function setI18ns(CrossSellingGroupI18n ...$i18ns): CrossSellingGroup
    {
        $this->i18ns = $i18ns;

        return $this;
    }

    /**
     * @return CrossSellingGroup
     */
    public function clearI18ns(): CrossSellingGroup
    {
        $this->i18ns = [];

        return $this;
    }
}
