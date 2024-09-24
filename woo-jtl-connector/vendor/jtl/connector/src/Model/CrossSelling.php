<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * Group cross-sold products belonging to different crossSellingGroups together.
 *
 * @access     public
 * @package    Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class CrossSelling extends AbstractIdentity
{
    /**
     * @var Identity Source product
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("productId")
     * @Serializer\Accessor(getter="getProductId",setter="setProductId")
     */
    protected Identity $productId;

    /**
     * @var CrossSellingItem[] Referenced cross-sold products grouped by their crossSellingGroup
     * @Serializer\Type("array<Jtl\Connector\Core\Model\CrossSellingItem>")
     * @Serializer\SerializedName("items")
     * @Serializer\AccessType("reflection")
     */
    protected array $items = [];

    /**
     * Constructor.
     *
     * @param string $endpoint
     * @param int    $host
     */
    public function __construct(string $endpoint = '', int $host = 0)
    {
        parent::__construct($endpoint, $host);
        $this->productId = new Identity();
    }

    /**
     * @return Identity Source product
     */
    public function getProductId(): Identity
    {
        return $this->productId;
    }

    /**
     * @param Identity $productId Source product
     *
     * @return CrossSelling
     */
    public function setProductId(Identity $productId): CrossSelling
    {
        $this->productId = $productId;

        return $this;
    }

    /**
     * @param CrossSellingItem $item
     *
     * @return CrossSelling
     */
    public function addItem(CrossSellingItem $item): CrossSelling
    {
        $this->items[] = $item;

        return $this;
    }

    /**
     * @return CrossSellingItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param CrossSellingItem ...$items
     *
     * @return CrossSelling
     */
    public function setItems(CrossSellingItem ...$items): CrossSelling
    {
        $this->items = $items;

        return $this;
    }

    /**
     * @return CrossSelling
     */
    public function clearItems(): CrossSelling
    {
        $this->items = [];

        return $this;
    }
}
