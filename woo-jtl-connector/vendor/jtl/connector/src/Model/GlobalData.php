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
class GlobalData extends AbstractModel
{
    /**
     * @var ConfigGroup[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\ConfigGroup>")
     * @Serializer\SerializedName("configGroups")
     * @Serializer\AccessType("reflection")
     */
    protected array $configGroups = [];

    /**
     * @var ConfigItem[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\ConfigItem>")
     * @Serializer\SerializedName("configItems")
     * @Serializer\AccessType("reflection")
     */
    protected array $configItems = [];

    /**
     * @var CrossSellingGroup[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\CrossSellingGroup>")
     * @Serializer\SerializedName("crossSellingGroups")
     * @Serializer\AccessType("reflection")
     */
    protected array $crossSellingGroups = [];

    /**
     * @var Currency[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\Currency>")
     * @Serializer\SerializedName("currencies")
     * @Serializer\AccessType("reflection")
     */
    protected array $currencies = [];

    /**
     * @var CustomerGroup[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\CustomerGroup>")
     * @Serializer\SerializedName("customerGroups")
     * @Serializer\AccessType("reflection")
     */
    protected array $customerGroups = [];

    /**
     * @var Language[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\Language>")
     * @Serializer\SerializedName("languages")
     * @Serializer\AccessType("reflection")
     */
    protected array $languages = [];

    /**
     * @var MeasurementUnit[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\MeasurementUnit>")
     * @Serializer\SerializedName("measurementUnits")
     * @Serializer\AccessType("reflection")
     */
    protected array $measurementUnits = [];

    /**
     * @var ProductType[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\ProductType>")
     * @Serializer\SerializedName("productTypes")
     * @Serializer\AccessType("reflection")
     */
    protected array $productTypes = [];

    /**
     * @var ShippingClass[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\ShippingClass>")
     * @Serializer\SerializedName("shippingClasses")
     * @Serializer\AccessType("reflection")
     */
    protected array $shippingClasses = [];

    /**
     * @var ShippingMethod[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\ShippingMethod>")
     * @Serializer\SerializedName("shippingMethods")
     * @Serializer\AccessType("reflection")
     */
    protected array $shippingMethods = [];

    /**
     * @var TaxRate[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\TaxRate>")
     * @Serializer\SerializedName("taxRates")
     * @Serializer\AccessType("reflection")
     */
    protected array $taxRates = [];

    /**
     * @var Unit[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\Unit>")
     * @Serializer\SerializedName("units")
     * @Serializer\AccessType("reflection")
     */
    protected array $units = [];

    /**
     * @var Warehouse[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\Warehouse>")
     * @Serializer\SerializedName("warehouses")
     * @Serializer\AccessType("reflection")
     */
    protected array $warehouses = [];


    /**
     * @param ConfigGroup $configGroup
     *
     * @return GlobalData
     */
    public function addConfigGroup(ConfigGroup $configGroup): GlobalData
    {
        $this->configGroups[] = $configGroup;

        return $this;
    }

    /**
     * @return ConfigGroup[]
     */
    public function getConfigGroups(): array
    {
        return $this->configGroups;
    }

    /**
     * @param ConfigGroup ...$configGroups
     *
     * @return GlobalData
     */
    public function setConfigGroups(ConfigGroup ...$configGroups): GlobalData
    {
        $this->configGroups = $configGroups;

        return $this;
    }

    /**
     * @return GlobalData
     */
    public function clearConfigGroups(): GlobalData
    {
        $this->configGroups = [];

        return $this;
    }

    /**
     * @param ConfigItem $configItem
     *
     * @return GlobalData
     */
    public function addConfigItem(ConfigItem $configItem): GlobalData
    {
        $this->configItems[] = $configItem;

        return $this;
    }

    /**
     * @return ConfigItem[]
     */
    public function getConfigItems(): array
    {
        return $this->configItems;
    }

    /**
     * @param ConfigItem ...$configItems
     *
     * @return GlobalData
     */
    public function setConfigItems(ConfigItem ...$configItems): GlobalData
    {
        $this->configItems = $configItems;

        return $this;
    }

    /**
     * @return GlobalData
     */
    public function clearConfigItems(): GlobalData
    {
        $this->configItems = [];

        return $this;
    }

    /**
     * @param CrossSellingGroup $crossSellingGroup
     *
     * @return GlobalData
     */
    public function addCrossSellingGroup(CrossSellingGroup $crossSellingGroup): GlobalData
    {
        $this->crossSellingGroups[] = $crossSellingGroup;

        return $this;
    }

    /**
     * @return CrossSellingGroup[]
     */
    public function getCrossSellingGroups(): array
    {
        return $this->crossSellingGroups;
    }

    /**
     * @param CrossSellingGroup ...$crossSellingGroups
     *
     * @return GlobalData
     */
    public function setCrossSellingGroups(CrossSellingGroup ...$crossSellingGroups): GlobalData
    {
        $this->crossSellingGroups = $crossSellingGroups;

        return $this;
    }

    /**
     * @return GlobalData
     */
    public function clearCrossSellingGroups(): GlobalData
    {
        $this->crossSellingGroups = [];

        return $this;
    }

    /**
     * @param Currency $currency
     *
     * @return GlobalData
     */
    public function addCurrency(Currency $currency): GlobalData
    {
        $this->currencies[] = $currency;

        return $this;
    }

    /**
     * @return Currency[]
     */
    public function getCurrencies(): array
    {
        return $this->currencies;
    }

    /**
     * @param Currency ...$currencies
     *
     * @return GlobalData
     */
    public function setCurrencies(Currency ...$currencies): GlobalData
    {
        $this->currencies = $currencies;

        return $this;
    }

    /**
     * @return GlobalData
     */
    public function clearCurrencies(): GlobalData
    {
        $this->currencies = [];

        return $this;
    }

    /**
     * @param CustomerGroup $customerGroup
     *
     * @return GlobalData
     */
    public function addCustomerGroup(CustomerGroup $customerGroup): GlobalData
    {
        $this->customerGroups[] = $customerGroup;

        return $this;
    }

    /**
     * @return CustomerGroup[]
     */
    public function getCustomerGroups(): array
    {
        return $this->customerGroups;
    }

    /**
     * @param CustomerGroup ...$customerGroups
     *
     * @return GlobalData
     */
    public function setCustomerGroups(CustomerGroup ...$customerGroups): GlobalData
    {
        $this->customerGroups = $customerGroups;

        return $this;
    }

    /**
     * @return GlobalData
     */
    public function clearCustomerGroups(): GlobalData
    {
        $this->customerGroups = [];

        return $this;
    }

    /**
     * @param Language $language
     *
     * @return GlobalData
     */
    public function addLanguage(Language $language): GlobalData
    {
        $this->languages[] = $language;

        return $this;
    }

    /**
     * @return Language[]
     */
    public function getLanguages(): array
    {
        return $this->languages;
    }

    /**
     * @param Language ...$languages
     *
     * @return GlobalData
     */
    public function setLanguages(Language ...$languages): GlobalData
    {
        $this->languages = $languages;

        return $this;
    }

    /**
     * @return GlobalData
     */
    public function clearLanguages(): GlobalData
    {
        $this->languages = [];

        return $this;
    }

    /**
     * @param MeasurementUnit $measurementUnit
     *
     * @return GlobalData
     */
    public function addMeasurementUnit(MeasurementUnit $measurementUnit): GlobalData
    {
        $this->measurementUnits[] = $measurementUnit;

        return $this;
    }

    /**
     * @return MeasurementUnit[]
     */
    public function getMeasurementUnits(): array
    {
        return $this->measurementUnits;
    }

    /**
     * @param MeasurementUnit ...$measurementUnits
     *
     * @return GlobalData
     */
    public function setMeasurementUnits(MeasurementUnit ...$measurementUnits): GlobalData
    {
        $this->measurementUnits = $measurementUnits;

        return $this;
    }

    /**
     * @return GlobalData
     */
    public function clearMeasurementUnits(): GlobalData
    {
        $this->measurementUnits = [];

        return $this;
    }

    /**
     * @param ProductType $productType
     *
     * @return GlobalData
     */
    public function addProductType(ProductType $productType): GlobalData
    {
        $this->productTypes[] = $productType;

        return $this;
    }

    /**
     * @return ProductType[]
     */
    public function getProductTypes(): array
    {
        return $this->productTypes;
    }

    /**
     * @param ProductType ...$productTypes
     *
     * @return GlobalData
     */
    public function setProductTypes(ProductType ...$productTypes): GlobalData
    {
        $this->productTypes = $productTypes;

        return $this;
    }

    /**
     * @return GlobalData
     */
    public function clearProductTypes(): GlobalData
    {
        $this->productTypes = [];

        return $this;
    }

    /**
     * @param ShippingClass $shippingClass
     *
     * @return GlobalData
     */
    public function addShippingClass(ShippingClass $shippingClass): GlobalData
    {
        $this->shippingClasses[] = $shippingClass;

        return $this;
    }

    /**
     * @return ShippingClass[]
     */
    public function getShippingClasses(): array
    {
        return $this->shippingClasses;
    }

    /**
     * @param ShippingClass ...$shippingClasses
     *
     * @return GlobalData
     */
    public function setShippingClasses(ShippingClass ...$shippingClasses): GlobalData
    {
        $this->shippingClasses = $shippingClasses;

        return $this;
    }

    /**
     * @return GlobalData
     */
    public function clearShippingClasses(): GlobalData
    {
        $this->shippingClasses = [];

        return $this;
    }

    /**
     * @param ShippingMethod $shippingMethod
     *
     * @return GlobalData
     */
    public function addShippingMethod(ShippingMethod $shippingMethod): GlobalData
    {
        $this->shippingMethods[] = $shippingMethod;

        return $this;
    }

    /**
     * @return ShippingMethod[]
     */
    public function getShippingMethods(): array
    {
        return $this->shippingMethods;
    }

    /**
     * @param ShippingMethod ...$shippingMethods
     *
     * @return GlobalData
     */
    public function setShippingMethods(ShippingMethod ...$shippingMethods): GlobalData
    {
        $this->shippingMethods = $shippingMethods;

        return $this;
    }

    /**
     * @return GlobalData
     */
    public function clearShippingMethods(): GlobalData
    {
        $this->shippingMethods = [];

        return $this;
    }

    /**
     * @param TaxRate $taxRate
     *
     * @return GlobalData
     */
    public function addTaxRate(TaxRate $taxRate): GlobalData
    {
        $this->taxRates[] = $taxRate;

        return $this;
    }

    /**
     * @return TaxRate[]
     */
    public function getTaxRates(): array
    {
        return $this->taxRates;
    }

    /**
     * @param TaxRate ...$taxRates
     *
     * @return GlobalData
     */
    public function setTaxRates(TaxRate ...$taxRates): GlobalData
    {
        $this->taxRates = $taxRates;

        return $this;
    }

    /**
     * @return GlobalData
     */
    public function clearTaxRates(): GlobalData
    {
        $this->taxRates = [];

        return $this;
    }

    /**
     * @param Unit $unit
     *
     * @return GlobalData
     */
    public function addUnit(Unit $unit): GlobalData
    {
        $this->units[] = $unit;

        return $this;
    }

    /**
     * @return Unit[]
     */
    public function getUnits(): array
    {
        return $this->units;
    }

    /**
     * @param Unit ...$units
     *
     * @return GlobalData
     */
    public function setUnits(Unit ...$units): GlobalData
    {
        $this->units = $units;

        return $this;
    }

    /**
     * @return GlobalData
     */
    public function clearUnits(): GlobalData
    {
        $this->units = [];

        return $this;
    }

    /**
     * @param Warehouse $warehouse
     *
     * @return GlobalData
     */
    public function addWarehouse(Warehouse $warehouse): GlobalData
    {
        $this->warehouses[] = $warehouse;

        return $this;
    }

    /**
     * @return Warehouse[]
     */
    public function getWarehouses(): array
    {
        return $this->warehouses;
    }

    /**
     * @param Warehouse ...$warehouses
     *
     * @return GlobalData
     */
    public function setWarehouses(Warehouse ...$warehouses): GlobalData
    {
        $this->warehouses = $warehouses;

        return $this;
    }

    /**
     * @return GlobalData
     */
    public function clearWarehouses(): GlobalData
    {
        $this->warehouses = [];

        return $this;
    }
}
