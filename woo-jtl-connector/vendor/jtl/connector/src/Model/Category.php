<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;
use Jtl\Connector\Core\Utilities\Validator\Validate;
use TypeError;

/**
 * A category with sort number, link to parent category and level
 *
 * @access     public
 * @package    Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class Category extends AbstractIdentity implements TranslatableAttributesInterface
{
    use TranslatableAttributesTrait;

    /**
     * @var Identity Optional reference to parent category id
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("parentCategoryId")
     * @Serializer\Accessor(getter="getParentCategoryId",setter="setParentCategoryId")
     */
    protected Identity $parentCategoryId;

    /**
     * @var boolean
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("isActive")
     * @Serializer\Accessor(getter="getIsActive",setter="setIsActive")
     */
    protected bool $isActive = false;

    /**
     * @var integer
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("level")
     * @Serializer\Accessor(getter="getLevel",setter="setLevel")
     */
    protected int $level = 0;

    /**
     * @var integer Optional sort order number
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("sort")
     * @Serializer\Accessor(getter="getSort",setter="setSort")
     */
    protected int $sort = 0;

    /**
     * @var TranslatableAttribute[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\CategoryAttribute>")
     * @Serializer\SerializedName("attributes")
     * @Serializer\AccessType("reflection")
     */
    protected array $attributes = [];

    /**
     * @var CategoryCustomerGroup[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\CategoryCustomerGroup>")
     * @Serializer\SerializedName("customerGroups")
     * @Serializer\AccessType("reflection")
     */
    protected array $customerGroups = [];

    /**
     * @var CategoryI18n[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\CategoryI18n>")
     * @Serializer\SerializedName("i18ns")
     * @Serializer\AccessType("reflection")
     */
    protected array $i18ns = [];

    /**
     * @var CategoryInvisibility[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\CategoryInvisibility>")
     * @Serializer\SerializedName("invisibilities")
     * @Serializer\AccessType("reflection")
     */
    protected array $invisibilities = [];

    /**
     * Constructor.
     *
     * @param string $endpoint
     * @param int    $host
     */
    public function __construct(string $endpoint = '', int $host = 0)
    {
        parent::__construct($endpoint, $host);
        $this->parentCategoryId = new Identity();
    }

    /**
     * @return Identity Optional reference to parent category id
     */
    public function getParentCategoryId(): Identity
    {
        return $this->parentCategoryId;
    }

    /**
     * @param Identity $parentCategoryId Optional reference to parent category id
     *
     * @return Category
     */
    public function setParentCategoryId(Identity $parentCategoryId): self
    {
        $this->parentCategoryId = $parentCategoryId;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getIsActive(): bool
    {
        return $this->isActive;
    }

    /**
     * @param boolean $isActive
     *
     * @return Category
     */
    public function setIsActive(bool $isActive): self
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * @return integer
     */
    public function getLevel(): int
    {
        return $this->level;
    }

    /**
     * @param integer $level
     *
     * @return Category
     */
    public function setLevel(int $level): self
    {
        $this->level = $level;

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
     * @return Category
     */
    public function setSort(int $sort): self
    {
        $this->sort = $sort;

        return $this;
    }

    /**
     * @param TranslatableAttribute $attribute
     *
     * @return Category
     */
    public function addAttribute(TranslatableAttribute $attribute): self
    {
        $this->attributes[] = $attribute;

        return $this;
    }

    /**
     * @return TranslatableAttribute[]
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

    /**
     * @inheritDoc
     */
    public function setAttributes(TranslatableAttribute ...$attributes): self
    {
        $this->attributes = $attributes;

        return $this;
    }

    /**
     * @return Category
     */
    public function clearAttributes(): self
    {
        $this->attributes = [];

        return $this;
    }

    /**
     * @param CategoryCustomerGroup $customerGroup
     *
     * @return Category
     */
    public function addCustomerGroup(CategoryCustomerGroup $customerGroup): self
    {
        $this->customerGroups[] = $customerGroup;

        return $this;
    }

    /**
     * @return CategoryCustomerGroup[]
     */
    public function getCustomerGroups(): array
    {
        return $this->customerGroups;
    }

    /**
     * @param CategoryCustomerGroup ...$customerGroups
     *
     * @return Category
     */
    public function setCustomerGroups(CategoryCustomerGroup ...$customerGroups): self
    {
        $this->customerGroups = $customerGroups;

        return $this;
    }

    /**
     * @return Category
     */
    public function clearCustomerGroups(): self
    {
        $this->customerGroups = [];

        return $this;
    }

    /**
     * @param CategoryI18n $i18n
     *
     * @return Category
     */
    public function addI18n(CategoryI18n $i18n): self
    {
        $this->i18ns[] = $i18n;

        return $this;
    }

    /**
     * @return Category
     */
    public function clearI18ns(): self
    {
        $this->i18ns = [];

        return $this;
    }

    /**
     * @param CategoryInvisibility $invisibility
     *
     * @return Category
     */
    public function addInvisibility(CategoryInvisibility $invisibility): self
    {
        $this->invisibilities[] = $invisibility;

        return $this;
    }

    /**
     * @return CategoryInvisibility[]
     */
    public function getInvisibilities(): array
    {
        return $this->invisibilities;
    }

    /**
     * @param CategoryInvisibility ...$invisibilities
     *
     * @return Category
     */
    public function setInvisibilities(CategoryInvisibility ...$invisibilities): self
    {
        $this->invisibilities = $invisibilities;

        return $this;
    }

    /**
     * @return Category
     */
    public function clearInvisibilities(): self
    {
        $this->invisibilities = [];

        return $this;
    }

    /**
     * @return string[]
     */
    public function getIdentificationStrings(): array
    {
        $this->unsetIdentificationStringBySubject('parentCategoryId');
        if ($this->parentCategoryId->getHost() > 0) {
            $this->setIdentificationStringBySubject(
                'parentCategoryId',
                \sprintf('Parent JTL-Wawi PK = %s', $this->parentCategoryId->getHost())
            );
        }

        $this->unsetIdentificationStringBySubject('name');
        foreach ($this->getI18ns() as $i18n) {
            if ($i18n->getName() !== '') {
                $this->setIdentificationStringBySubject('name', \sprintf('Name = %s', $i18n->getName()));
                break;
            }
        }

        return parent::getIdentificationStrings();
    }

    /**
     * @return CategoryI18n[]
     */
    public function getI18ns(): array
    {
        return $this->i18ns;
    }

    /**
     * @param CategoryI18n ...$i18ns
     *
     * @return Category
     */
    public function setI18ns(CategoryI18n ...$i18ns): self
    {
        $this->i18ns = $i18ns;

        return $this;
    }
}
