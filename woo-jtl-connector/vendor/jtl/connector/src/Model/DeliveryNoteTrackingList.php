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
class DeliveryNoteTrackingList extends AbstractModel
{
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("name")
     * @Serializer\Accessor(getter="getName",setter="setName")
     */
    protected string $name = '';

    /**
     * @var string[]
     * @Serializer\Type("array<string>")
     * @Serializer\SerializedName("codes")
     * @Serializer\AccessType("reflection")
     */
    protected array $codes = [];

    /**
     * @var string[]
     * @Serializer\Type("array<string>")
     * @Serializer\SerializedName("trackingURLs")
     * @Serializer\AccessType("reflection")
     */
    protected array $trackingURLs = [];

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return DeliveryNoteTrackingList
     */
    public function setName(string $name): DeliveryNoteTrackingList
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param string $code
     *
     * @return DeliveryNoteTrackingList
     */
    public function addCode(string $code): DeliveryNoteTrackingList
    {
        $this->codes[] = $code;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getCodes(): array
    {
        return $this->codes;
    }

    /**
     * @param string ...$codes
     *
     * @return DeliveryNoteTrackingList
     */
    public function setCodes(string ...$codes): DeliveryNoteTrackingList
    {
        $this->codes = $codes;

        return $this;
    }

    /**
     * @return DeliveryNoteTrackingList
     */
    public function clearCodes(): DeliveryNoteTrackingList
    {
        $this->codes = [];

        return $this;
    }

    /**
     * @return string[]
     */
    public function getTrackingURLs(): array
    {
        return $this->trackingURLs;
    }

    /**
     * @param string ...$trackingURLs
     *
     * @return DeliveryNoteTrackingList
     */
    public function setTrackingURLs(string ...$trackingURLs): DeliveryNoteTrackingList
    {
        $this->trackingURLs = $trackingURLs;
        return $this;
    }

    /**
     * @param string $trackingURL
     *
     * @return DeliveryNoteTrackingList
     */
    public function addTrackingURL(string $trackingURL): DeliveryNoteTrackingList
    {
        $this->trackingURLs[] = $trackingURL;
        return $this;
    }

    /**
     * @return DeliveryNoteTrackingList
     */
    public function clearTrackingURLs(): DeliveryNoteTrackingList
    {
        $this->trackingURLs = [];
        return $this;
    }
}
