<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * Specify cross-sold products that are in a common crossSellingGroup.
 *
 * @access     public
 * @package    Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class CrossSellingItem extends AbstractIdentity
{
    /**
     * @var Identity Reference to crossSellingGroup
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("crossSellingGroupId")
     * @Serializer\Accessor(getter="getCrossSellingGroupId",setter="setCrossSellingGroupId")
     */
    protected Identity $crossSellingGroupId;


    /**
     * @var CrossSellingGroup|null
     * @Serializer\Type("Jtl\Connector\Core\Model\CrossSellingGroup")
     * @Serializer\SerializedName("crossSellingGroup")
     * @Serializer\Accessor(getter="getCrossSellingGroup",setter="setCrossSellingGroup")
     */
    protected ?CrossSellingGroup $crossSellingGroup = null;

    /**
     * @var Identity[] Referenced target product ID
     * @Serializer\Type("array<Jtl\Connector\Core\Model\Identity>")
     * @Serializer\SerializedName("productIds")
     * @Serializer\AccessType("reflection")
     */
    protected array $productIds = [];

    /**
     * Constructor
     */
    public function __construct(string $endpoint = '', int $host = 0)
    {
        parent::__construct($endpoint, $host);
        $this->crossSellingGroupId = new Identity();
    }

    /**
     * @return Identity Reference to crossSellingGroup
     */
    public function getCrossSellingGroupId(): Identity
    {
        return $this->crossSellingGroupId;
    }

    /**
     * @param Identity $crossSellingGroupId Reference to crossSellingGroup
     *
     * @return CrossSellingItem
     */
    public function setCrossSellingGroupId(Identity $crossSellingGroupId): CrossSellingItem
    {
        $this->crossSellingGroupId = $crossSellingGroupId;

        return $this;
    }

    /**
     * @return CrossSellingGroup|null
     */
    public function getCrossSellingGroup(): ?CrossSellingGroup
    {
        return $this->crossSellingGroup;
    }

    /**
     * @param CrossSellingGroup|null $crossSellingGroup
     *
     * @return CrossSellingItem
     */
    public function setCrossSellingGroup(?CrossSellingGroup $crossSellingGroup): CrossSellingItem
    {
        $this->crossSellingGroup = $crossSellingGroup;
        return $this;
    }

    /**
     * @param Identity $productId
     *
     * @return CrossSellingItem
     */
    public function addProductId(Identity $productId): CrossSellingItem
    {
        $this->productIds[] = $productId;

        return $this;
    }

    /**
     * @return Identity[]
     */
    public function getProductIds(): array
    {
        return $this->productIds;
    }

    /**
     * @param Identity ...$productIds
     *
     * @return CrossSellingItem
     */
    public function setProductIds(Identity ...$productIds): CrossSellingItem
    {
        $this->productIds = $productIds;

        return $this;
    }

    /**
     * @return CrossSellingItem
     */
    public function clearProductIds(): CrossSellingItem
    {
        $this->productIds = [];

        return $this;
    }
}
