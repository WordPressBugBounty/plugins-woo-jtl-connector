<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;
use Jtl\Connector\Core\Exception\MustNotBeNullException;
use Jtl\Connector\Core\Utilities\Validator\Validate;
use TypeError;

/**
 * Product-ConfigGroup Assignment.
 *
 * @access     public
 * @package    Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class ProductConfigGroup extends AbstractModel
{
    /**
     * @var Identity Reference to configGroup
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("configGroupId")
     * @Serializer\Accessor(getter="getConfigGroupId",setter="setConfigGroupId")
     */
    protected Identity $configGroupId;

    /**
     * @var integer Optional sort number
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("sort")
     * @Serializer\Accessor(getter="getSort",setter="setSort")
     */
    protected int $sort = 0;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->configGroupId = new Identity();
    }

    /**
     * @return Identity Reference to configGroup
     * @throws MustNotBeNullException
     * @throws TypeError
     */
    public function getConfigGroupId(): Identity
    {
        return Validate::checkIdentityAndNotNull($this->configGroupId);
    }

    /**
     * @param Identity $configGroupId Reference to configGroup
     *
     * @return ProductConfigGroup
     */
    public function setConfigGroupId(Identity $configGroupId): ProductConfigGroup
    {
        $this->configGroupId = $configGroupId;

        return $this;
    }

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
     * @return ProductConfigGroup
     */
    public function setSort(int $sort): ProductConfigGroup
    {
        $this->sort = $sort;

        return $this;
    }
}
