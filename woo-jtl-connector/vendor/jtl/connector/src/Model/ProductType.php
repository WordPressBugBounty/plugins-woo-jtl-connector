<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * ProductType model to classify and group products.
 *
 * @access     public
 * @package    Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class ProductType extends AbstractIdentity
{
    /**
     * @var string Optional (internal) product type name
     * @Serializer\Type("string")
     * @Serializer\SerializedName("name")
     * @Serializer\Accessor(getter="getName",setter="setName")
     */
    protected string $name = '';

    /**
     * @return string Optional (internal) product type name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name Optional (internal) product type name
     *
     * @return ProductType
     */
    public function setName(string $name): ProductType
    {
        $this->name = $name;

        return $this;
    }
}
