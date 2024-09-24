<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;
use Jtl\Connector\Core\Exception\MustNotBeNullException;
use Jtl\Connector\Core\Utilities\Validator\Validate;
use TypeError;

/**
 * Product price properties.
 *
 * @access     public
 * @package    Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class ProductPrice extends AbstractIdentity
{
    /**
     * @var Identity Reference to customerGroup
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("customerGroupId")
     * @Serializer\Accessor(getter="getCustomerGroupId",setter="setCustomerGroupId")
     */
    protected Identity $customerGroupId;

    /**
     * @var Identity Reference to customer
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("customerId")
     * @Serializer\Accessor(getter="getCustomerId",setter="setCustomerId")
     */
    protected Identity $customerId;

    /**
     * @var Identity Reference to product
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("productId")
     * @Serializer\Accessor(getter="getProductId",setter="setProductId")
     */
    protected Identity $productId;

    /**
     * @var ProductPriceItem[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\ProductPriceItem>")
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
        $this->customerGroupId = new Identity();
        $this->productId       = new Identity();
        $this->customerId      = new Identity();
    }

    /**
     * @return Identity Reference to customerGroup
     * @throws MustNotBeNullException
     * @throws TypeError
     */
    public function getCustomerGroupId(): Identity
    {
        return Validate::checkIdentityAndNotNull($this->customerGroupId);
    }

    /**
     * @param Identity $customerGroupId Reference to customerGroup
     *
     * @return ProductPrice
     */
    public function setCustomerGroupId(Identity $customerGroupId): ProductPrice
    {
        $this->customerGroupId = $customerGroupId;

        return $this;
    }

    /**
     * @return Identity Reference to customer
     * @throws MustNotBeNullException
     * @throws TypeError
     */
    public function getCustomerId(): Identity
    {
        return Validate::checkIdentityAndNotNull($this->customerId);
    }

    /**
     * @param Identity $customerId Reference to customer
     *
     * @return ProductPrice
     */
    public function setCustomerId(Identity $customerId): ProductPrice
    {
        $this->customerId = $customerId;

        return $this;
    }

    /**
     * @return Identity Reference to product
     * @throws MustNotBeNullException
     * @throws TypeError
     */
    public function getProductId(): Identity
    {
        return Validate::checkIdentityAndNotNull($this->productId);
    }

    /**
     * @param Identity $productId Reference to product
     *
     * @return ProductPrice
     */
    public function setProductId(Identity $productId): ProductPrice
    {
        $this->productId = $productId;

        return $this;
    }

    /**
     * @param ProductPriceItem $item
     *
     * @return ProductPrice
     */
    public function addItem(ProductPriceItem $item): ProductPrice
    {
        $this->items[] = $item;

        return $this;
    }

    /**
     * @return ProductPriceItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param ProductPriceItem ...$items
     *
     * @return ProductPrice
     */
    public function setItems(ProductPriceItem ...$items): ProductPrice
    {
        $this->items = $items;

        return $this;
    }

    /**
     * @return ProductPrice
     */
    public function clearItems(): ProductPrice
    {
        $this->items = [];

        return $this;
    }
}
