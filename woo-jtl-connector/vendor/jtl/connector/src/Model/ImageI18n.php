<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;
use Jtl\Connector\Core\Exception\MustNotBeNullException;
use Jtl\Connector\Core\Utilities\Validator\Validate;
use TypeError;

/**
 * @access     public
 * @package    Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class ImageI18n extends AbstractI18n implements IdentityInterface
{
    /**
     * @var Identity
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("id")
     * @Serializer\Accessor(getter="getId",setter="setId")
     */
    protected Identity $id;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("altText")
     * @Serializer\Accessor(getter="getAltText",setter="setAltText")
     */
    protected string $altText = '';

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->id = new Identity();
    }

    /**
     * @return Identity
     * @throws MustNotBeNullException
     * @throws TypeError
     */
    public function getId(): Identity
    {
        return Validate::checkIdentityAndNotNull($this->id);
    }

    /**
     * @param Identity $id
     *
     * @return ImageI18n
     */
    public function setId(Identity $id): ImageI18n
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getAltText(): string
    {
        return $this->altText;
    }

    /**
     * @param string $altText
     *
     * @return ImageI18n
     */
    public function setAltText(string $altText): ImageI18n
    {
        $this->altText = $altText;

        return $this;
    }
}
