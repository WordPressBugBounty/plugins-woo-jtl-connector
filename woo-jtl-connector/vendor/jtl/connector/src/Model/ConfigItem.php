<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * A config Item that is displayed in a config Group.
 * Config item can reference to a specific productId to inherit price, name and description.
 *
 * @access     public
 * @package    Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class ConfigItem extends AbstractIdentity
{
    /**
     * @var Identity Reference to configGroup
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("configGroupId")
     * @Serializer\Accessor(getter="getConfigGroupId",setter="setConfigGroupId")
     */
    protected Identity $configGroupId;

    /**
     * @var Identity Optional reference to product
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("productId")
     * @Serializer\Accessor(getter="getProductId",setter="setProductId")
     */
    protected Identity $productId;

    /**
     * @var integer     Optional:Ignore multiplier.
     *                  If true, quantity of config item will not be increased if product quantity is increased
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("ignoreMultiplier")
     * @Serializer\Accessor(getter="getIgnoreMultiplier",setter="setIgnoreMultiplier")
     */
    protected int $ignoreMultiplier = 0;

    /**
     * @var boolean Optional: Inherit product name and description  if productId is set.
     *                  If true, configItem name will be received from referenced
     *                  product and configItemI18n name will be ignored.
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("inheritProductName")
     * @Serializer\Accessor(getter="getInheritProductName",setter="setInheritProductName")
     */
    protected bool $inheritProductName = false;

    /**
     * @var boolean Optional: Inherit product price of referenced productId.
     *              If true, configItem price will be the same as referenced product price.
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("inheritProductPrice")
     * @Serializer\Accessor(getter="getInheritProductPrice",setter="setInheritProductPrice")
     */
    protected bool $inheritProductPrice = false;

    /**
     * @var double Optional initial / predefined quantity. Default is one (1) quantity piece.
     * @Serializer\Type("double")
     * @Serializer\SerializedName("initialQuantity")
     * @Serializer\Accessor(getter="getInitialQuantity",setter="setInitialQuantity")
     */
    protected float $initialQuantity = 0.0;

    /**
     * @var boolean Optional: Preselect configItem. If true, configItem will be preselected or prechecked.
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("isPreSelected")
     * @Serializer\Accessor(getter="getIsPreSelected",setter="setIsPreSelected")
     */
    protected bool $isPreSelected = false;

    /**
     * @var boolean Optional: Highlight or recommend config item. If true, configItem will be recommended/highlighted.
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("isRecommended")
     * @Serializer\Accessor(getter="getIsRecommended",setter="setIsRecommended")
     */
    protected bool $isRecommended = false;

    /**
     * @var double Maximum allowed quantity. Default 0 for no maximum limit.
     * @Serializer\Type("double")
     * @Serializer\SerializedName("maxQuantity")
     * @Serializer\Accessor(getter="getMaxQuantity",setter="setMaxQuantity")
     */
    protected float $maxQuantity = 0.0;

    /**
     * @var double Optional minimum quantity required to add configItem. Default 0 for no minimum quantity.
     * @Serializer\Type("double")
     * @Serializer\SerializedName("minQuantity")
     * @Serializer\Accessor(getter="getMinQuantity",setter="setMinQuantity")
     */
    protected float $minQuantity = 0.0;

    /**
     * @var boolean Optional: Show discount compared to productId price.
     *              If true, the discount compared to referenct product price will be shown.
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("showDiscount")
     * @Serializer\Accessor(getter="getShowDiscount",setter="setShowDiscount")
     */
    protected bool $showDiscount = false;

    /**
     * @var boolean Optional: Show surcharge compared to productId price.
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("showSurcharge")
     * @Serializer\Accessor(getter="getShowSurcharge",setter="setShowSurcharge")
     */
    protected bool $showSurcharge = false;

    /**
     * @var integer Optional sort order number
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("sort")
     * @Serializer\Accessor(getter="getSort",setter="setSort")
     */
    protected int $sort = 0;

    /**
     * @var integer Config item type. 0: Product, 1: Special
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("type")
     * @Serializer\Accessor(getter="getType",setter="setType")
     */
    protected int $type = 0;

    /**
     * @var ConfigItemI18n[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\ConfigItemI18n>")
     * @Serializer\SerializedName("i18ns")
     * @Serializer\AccessType("reflection")
     */
    protected array $i18ns = [];

    /**
     * @var ConfigItemPrice[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\ConfigItemPrice>")
     * @Serializer\SerializedName("prices")
     * @Serializer\AccessType("reflection")
     */
    protected array $prices = [];

    /**
     * Constructor.
     *
     * @param string $endpoint
     * @param int    $host
     */
    public function __construct(string $endpoint = '', int $host = 0)
    {
        parent::__construct($endpoint, $host);
        $this->configGroupId = new Identity();
        $this->productId     = new Identity();
    }

    /**
     * @return Identity Reference to configGroup
     */
    public function getConfigGroupId(): Identity
    {
        return $this->configGroupId;
    }

    /**
     * @param Identity $configGroupId Reference to configGroup
     *
     * @return ConfigItem
     */
    public function setConfigGroupId(Identity $configGroupId): ConfigItem
    {
        $this->configGroupId = $configGroupId;

        return $this;
    }

    /**
     * @return Identity Optional reference to product
     */
    public function getProductId(): Identity
    {
        return $this->productId;
    }

    /**
     * @param Identity $productId Optional reference to product
     *
     * @return ConfigItem
     */
    public function setProductId(Identity $productId): ConfigItem
    {
        $this->productId = $productId;

        return $this;
    }

    /**
     * @return integer Optional:Ignore multiplier.
     *                  If true, quantity of config item will not be increased if product quantity is increased
     */
    public function getIgnoreMultiplier(): int
    {
        return $this->ignoreMultiplier;
    }

    /**
     * @param integer $ignoreMultiplier Optional:Ignore multiplier.
     *                                  If true, quantity of config item will not be increased
     *                                  if product quantity is increased
     *
     * @return ConfigItem
     */
    public function setIgnoreMultiplier(int $ignoreMultiplier): ConfigItem
    {
        $this->ignoreMultiplier = $ignoreMultiplier;

        return $this;
    }

    /**
     * @return boolean Optional: Inherit product name and description  if productId is set.
     *                  If true, configItem name will be received from referenced product
     *                  and configItemI18n name will be ignored.
     */
    public function getInheritProductName(): bool
    {
        return $this->inheritProductName;
    }

    /**
     * @param boolean $inheritProductName Optional: Inherit product name and description  if productId is set.
     *                                    If true, configItem name will be received from referenced product and
     *                                    configItemI18n name will be ignored.
     *
     * @return ConfigItem
     */
    public function setInheritProductName(bool $inheritProductName): ConfigItem
    {
        $this->inheritProductName = $inheritProductName;

        return $this;
    }

    /**
     * @return boolean Optional: Inherit product price of referenced productId.
     *                  If true, configItem price will be the same as referenced product price.
     */
    public function getInheritProductPrice(): bool
    {
        return $this->inheritProductPrice;
    }

    /**
     * @param boolean $inheritProductPrice Optional: Inherit product price of referenced productId.
     *                                     If true, configItem price will be the same as referenced product price.
     *
     * @return ConfigItem
     */
    public function setInheritProductPrice(bool $inheritProductPrice): ConfigItem
    {
        $this->inheritProductPrice = $inheritProductPrice;

        return $this;
    }

    /**
     * @return double Optional initial / predefined quantity. Default is one (1) quantity piece.
     */
    public function getInitialQuantity(): float
    {
        return $this->initialQuantity;
    }

    /**
     * @param double $initialQuantity Optional initial / predefined quantity. Default is one (1) quantity piece.
     *
     * @return ConfigItem
     */
    public function setInitialQuantity(float $initialQuantity): ConfigItem
    {
        $this->initialQuantity = $initialQuantity;

        return $this;
    }

    /**
     * @return boolean Optional: Preselect configItem. If true, configItem will be preselected or prechecked.
     */
    public function getIsPreSelected(): bool
    {
        return $this->isPreSelected;
    }

    /**
     * @param boolean $isPreSelected     Optional: Preselect configItem.
     *                                   If true, configItem will be preselected or prechecked.
     *
     * @return ConfigItem
     */
    public function setIsPreSelected(bool $isPreSelected): ConfigItem
    {
        $this->isPreSelected = $isPreSelected;

        return $this;
    }

    /**
     * @return boolean Optional: Highlight or recommend config item.
     *                  If true, configItem will be recommended/highlighted.
     */
    public function getIsRecommended(): bool
    {
        return $this->isRecommended;
    }

    /**
     * @param boolean $isRecommended Optional: Highlight or recommend config item.
     *                               If true, configItem will be recommended/highlighted.
     *
     * @return ConfigItem
     */
    public function setIsRecommended(bool $isRecommended): ConfigItem
    {
        $this->isRecommended = $isRecommended;

        return $this;
    }

    /**
     * @return double Maximum allowed quantity. Default 0 for no maximum limit.
     */
    public function getMaxQuantity(): float
    {
        return $this->maxQuantity;
    }

    /**
     * @param double $maxQuantity Maximum allowed quantity. Default 0 for no maximum limit.
     *
     * @return ConfigItem
     */
    public function setMaxQuantity(float $maxQuantity): ConfigItem
    {
        $this->maxQuantity = $maxQuantity;

        return $this;
    }

    /**
     * @return double Optional minimum quantity required to add configItem. Default 0 for no minimum quantity.
     */
    public function getMinQuantity(): float
    {
        return $this->minQuantity;
    }

    /**
     * @param double $minQuantity Optional minimum quantity required to add configItem.
     *                            Default 0 for no minimum quantity.
     *
     * @return ConfigItem
     */
    public function setMinQuantity(float $minQuantity): ConfigItem
    {
        $this->minQuantity = $minQuantity;

        return $this;
    }

    /**
     * @return boolean Optional: Show discount compared to productId price.
     *                  If true, the discount compared to referenct product price will be shown.
     */
    public function getShowDiscount(): bool
    {
        return $this->showDiscount;
    }

    /**
     * @param boolean $showDiscount Optional: Show discount compared to productId price.
     *                              If true, the discount compared to referenct product price will be shown.
     *
     * @return ConfigItem
     */
    public function setShowDiscount(bool $showDiscount): ConfigItem
    {
        $this->showDiscount = $showDiscount;

        return $this;
    }

    /**
     * @return boolean Optional: Show surcharge compared to productId price.
     */
    public function getShowSurcharge(): bool
    {
        return $this->showSurcharge;
    }

    /**
     * @param boolean $showSurcharge Optional: Show surcharge compared to productId price.
     *
     * @return ConfigItem
     */
    public function setShowSurcharge(bool $showSurcharge): ConfigItem
    {
        $this->showSurcharge = $showSurcharge;

        return $this;
    }

    /**
     * @return integer Optional sort order number
     */
    public function getSort(): int
    {
        return $this->sort;
    }

    /**
     * @param integer $sort Optional sort order number
     *
     * @return ConfigItem
     */
    public function setSort(int $sort): ConfigItem
    {
        $this->sort = $sort;

        return $this;
    }

    /**
     * @return integer Config item type. 0: Product, 1: Special
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @param integer $type Config item type. 0: Product, 1: Special
     *
     * @return ConfigItem
     */
    public function setType(int $type): ConfigItem
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @param ConfigItemI18n $i18n
     *
     * @return ConfigItem
     */
    public function addI18n(ConfigItemI18n $i18n): ConfigItem
    {
        $this->i18ns[] = $i18n;

        return $this;
    }

    /**
     * @return ConfigItemI18n[]
     */
    public function getI18ns(): array
    {
        return $this->i18ns;
    }

    /**
     * @param ConfigItemI18n ...$i18ns
     *
     * @return ConfigItem
     */
    public function setI18ns(ConfigItemI18n ...$i18ns): ConfigItem
    {
        $this->i18ns = $i18ns;

        return $this;
    }

    /**
     * @return ConfigItem
     */
    public function clearI18ns(): ConfigItem
    {
        $this->i18ns = [];

        return $this;
    }

    /**
     * @param ConfigItemPrice $price
     *
     * @return ConfigItem
     */
    public function addPrice(ConfigItemPrice $price): ConfigItem
    {
        $this->prices[] = $price;

        return $this;
    }

    /**
     * @return ConfigItemPrice[]
     */
    public function getPrices(): array
    {
        return $this->prices;
    }

    /**
     * @param ConfigItemPrice ...$prices
     *
     * @return ConfigItem
     */
    public function setPrices(ConfigItemPrice ...$prices): ConfigItem
    {
        $this->prices = $prices;

        return $this;
    }

    /**
     * @return ConfigItem
     */
    public function clearPrices(): ConfigItem
    {
        $this->prices = [];

        return $this;
    }
}
