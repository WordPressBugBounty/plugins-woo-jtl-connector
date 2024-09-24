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
class CrossSellingGroupI18n extends AbstractI18n
{
    /**
     * @var string Optional localized description
     * @Serializer\Type("string")
     * @Serializer\SerializedName("description")
     * @Serializer\Accessor(getter="getDescription",setter="setDescription")
     */
    protected string $description = '';

    /**
     * @var string Localized name
     * @Serializer\Type("string")
     * @Serializer\SerializedName("name")
     * @Serializer\Accessor(getter="getName",setter="setName")
     */
    protected string $name = '';

    /**
     * @return string Optional localized description
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description Optional localized description
     *
     * @return CrossSellingGroupI18n
     */
    public function setDescription(string $description): CrossSellingGroupI18n
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string Localized name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name Localized name
     *
     * @return CrossSellingGroupI18n
     */
    public function setName(string $name): CrossSellingGroupI18n
    {
        $this->name = $name;

        return $this;
    }
}
