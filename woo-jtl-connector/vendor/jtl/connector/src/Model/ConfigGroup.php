<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * Config group holds several configItems and settings
 *
 * @access     public
 * @package    Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class ConfigGroup extends AbstractIdentity
{
    /**
     * @var string Optional internal comment to differantiate config groups by comment name
     * @Serializer\Type("string")
     * @Serializer\SerializedName("comment")
     * @Serializer\Accessor(getter="getComment",setter="setComment")
     */
    protected string $comment = '';

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("imagePath")
     * @Serializer\Accessor(getter="getImagePath",setter="setImagePath")
     */
    protected string $imagePath = '';

    /**
     * @var integer Optional maximum number allowed selections. Default 0 for no maximum limitation.
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("maximumSelection")
     * @Serializer\Accessor(getter="getMaximumSelection",setter="setMaximumSelection")
     */
    protected int $maximumSelection = 0;

    /**
     * @var integer Optional minimum number required selections. Default 0 for no minimum requirement.
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("minimumSelection")
     * @Serializer\Accessor(getter="getMinimumSelection",setter="setMinimumSelection")
     */
    protected int $minimumSelection = 0;

    /**
     * @var integer Optional sort order number
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("sort")
     * @Serializer\Accessor(getter="getSort",setter="setSort")
     */
    protected int $sort = 0;

    /**
     * @var integer Config group item type. 0: Checkbox, 1:Radio, 2, Dropdown, 3: Multiselect
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("type")
     * @Serializer\Accessor(getter="getType",setter="setType")
     */
    protected int $type = 0;

    /**
     * @var ConfigGroupI18n[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\ConfigGroupI18n>")
     * @Serializer\SerializedName("i18ns")
     * @Serializer\AccessType("reflection")
     */
    protected array $i18ns = [];

    /**
     * @return string Optional internal comment to differantiate config groups by comment name
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * @param string $comment Optional internal comment to differantiate config groups by comment name
     *
     * @return ConfigGroup
     */
    public function setComment(string $comment): ConfigGroup
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * @return string
     */
    public function getImagePath(): string
    {
        return $this->imagePath;
    }

    /**
     * @param string $imagePath
     *
     * @return ConfigGroup
     */
    public function setImagePath(string $imagePath): ConfigGroup
    {
        $this->imagePath = $imagePath;

        return $this;
    }

    /**
     * @return integer Optional maximum number allowed selections. Default 0 for no maximum limitation.
     */
    public function getMaximumSelection(): int
    {
        return $this->maximumSelection;
    }

    /**
     * @param integer $maximumSelection Optional maximum number allowed selections. Default 0 for no maximum limitation.
     *
     * @return ConfigGroup
     */
    public function setMaximumSelection(int $maximumSelection): ConfigGroup
    {
        $this->maximumSelection = $maximumSelection;

        return $this;
    }

    /**
     * @return integer Optional minimum number required selections. Default 0 for no minimum requirement.
     */
    public function getMinimumSelection(): int
    {
        return $this->minimumSelection;
    }

    /**
     * @param integer $minimumSelection Optional minimum number required selections.
     *                                  Default 0 for no minimum requirement.
     *
     * @return ConfigGroup
     */
    public function setMinimumSelection(int $minimumSelection): ConfigGroup
    {
        $this->minimumSelection = $minimumSelection;

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
     * @return ConfigGroup
     */
    public function setSort(int $sort): ConfigGroup
    {
        $this->sort = $sort;

        return $this;
    }

    /**
     * @return integer Config group item type. 0: Checkbox, 1:Radio, 2, Dropdown, 3: Multiselect
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @param integer $type Config group item type. 0: Checkbox, 1:Radio, 2, Dropdown, 3: Multiselect
     *
     * @return ConfigGroup
     */
    public function setType(int $type): ConfigGroup
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @param ConfigGroupI18n $i18n
     *
     * @return ConfigGroup
     */
    public function addI18n(ConfigGroupI18n $i18n): ConfigGroup
    {
        $this->i18ns[] = $i18n;

        return $this;
    }

    /**
     * @return ConfigGroupI18n[]
     */
    public function getI18ns(): array
    {
        return $this->i18ns;
    }

    /**
     * @param ConfigGroupI18n ...$i18ns
     *
     * @return ConfigGroup
     */
    public function setI18ns(ConfigGroupI18n ...$i18ns): ConfigGroup
    {
        $this->i18ns = $i18ns;

        return $this;
    }

    /**
     * @return ConfigGroup
     */
    public function clearI18ns(): ConfigGroup
    {
        $this->i18ns = [];

        return $this;
    }
}
