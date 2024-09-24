<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * A delivery note created for shipment.
 *
 * @access     public
 * @package    Jtl\Connector\Core\Model
 * @subpackage Product
 * @Serializer\AccessType("public_method")
 */
class DeliveryNote extends AbstractIdentity
{
    /**
     * @var Identity Reference to customerOrder
     * @Serializer\Type("Jtl\Connector\Core\Model\Identity")
     * @Serializer\SerializedName("customerOrderId")
     * @Serializer\Accessor(getter="getCustomerOrderId",setter="setCustomerOrderId")
     */
    protected Identity $customerOrderId;

    /**
     * @var \DateTimeInterface|null Creation date
     * @Serializer\Type("DateTimeInterface")
     * @Serializer\SerializedName("creationDate")
     * @Serializer\Accessor(getter="getCreationDate",setter="setCreationDate")
     */
    protected ?\DateTimeInterface $creationDate = null;

    /**
     * @var boolean Optional flag for fulfillment. True, if delivery ist fulfilled by someone else
     * @Serializer\Type("boolean")
     * @Serializer\SerializedName("isFulfillment")
     * @Serializer\Accessor(getter="getIsFulfillment",setter="setIsFulfillment")
     */
    protected bool $isFulfillment = false;

    /**
     * @var string Optional text note
     * @Serializer\Type("string")
     * @Serializer\SerializedName("note")
     * @Serializer\Accessor(getter="getNote",setter="setNote")
     */
    protected string $note = '';

    /**
     * @var DeliveryNoteItem[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\DeliveryNoteItem>")
     * @Serializer\SerializedName("items")
     * @Serializer\AccessType("reflection")
     */
    protected array $items = [];

    /**
     * @var DeliveryNoteTrackingList[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\DeliveryNoteTrackingList>")
     * @Serializer\SerializedName("trackingLists")
     * @Serializer\AccessType("reflection")
     */
    protected array $trackingLists = [];

    /**
     * Constructor.
     *
     * @param string $endpoint
     * @param int    $host
     */
    public function __construct(string $endpoint = '', int $host = 0)
    {
        parent::__construct($endpoint, $host);
        $this->customerOrderId = new Identity();
    }

    /**
     * @return Identity Reference to customerOrder
     */
    public function getCustomerOrderId(): Identity
    {
        return $this->customerOrderId;
    }

    /**
     * @param Identity $customerOrderId Reference to customerOrder
     *
     * @return DeliveryNote
     */
    public function setCustomerOrderId(Identity $customerOrderId): DeliveryNote
    {
        $this->customerOrderId = $customerOrderId;

        return $this;
    }

    /**
     * @return \DateTimeInterface Creation date
     */
    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creationDate;
    }

    /**
     * @param \DateTimeInterface|null $creationDate Creation date
     *
     * @return DeliveryNote
     */
    public function setCreationDate(\DateTimeInterface $creationDate = null): DeliveryNote
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * @return boolean Optional flag for fulfillment. True, if delivery ist fulfilled by someone else
     */
    public function getIsFulfillment(): bool
    {
        return $this->isFulfillment;
    }

    /**
     * @param boolean $isFulfillment Optional flag for fulfillment. True, if delivery ist fulfilled by someone else
     *
     * @return DeliveryNote
     */
    public function setIsFulfillment(bool $isFulfillment): DeliveryNote
    {
        $this->isFulfillment = $isFulfillment;

        return $this;
    }

    /**
     * @return string Optional text note
     */
    public function getNote(): string
    {
        return $this->note;
    }

    /**
     * @param string $note Optional text note
     *
     * @return DeliveryNote
     */
    public function setNote(string $note): DeliveryNote
    {
        $this->note = $note;

        return $this;
    }

    /**
     * @param DeliveryNoteItem $item
     *
     * @return DeliveryNote
     */
    public function addItem(DeliveryNoteItem $item): DeliveryNote
    {
        $this->items[] = $item;

        return $this;
    }

    /**
     * @return DeliveryNoteItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param DeliveryNoteItem ...$items
     *
     * @return DeliveryNote
     */
    public function setItems(DeliveryNoteItem ...$items): DeliveryNote
    {
        $this->items = $items;

        return $this;
    }

    /**
     * @return DeliveryNote
     */
    public function clearItems(): DeliveryNote
    {
        $this->items = [];

        return $this;
    }

    /**
     * @param DeliveryNoteTrackingList $trackingList
     *
     * @return DeliveryNote
     */
    public function addTrackingList(DeliveryNoteTrackingList $trackingList): DeliveryNote
    {
        $this->trackingLists[] = $trackingList;

        return $this;
    }

    /**
     * @return DeliveryNoteTrackingList[]
     */
    public function getTrackingLists(): array
    {
        return $this->trackingLists;
    }

    /**
     * @param DeliveryNoteTrackingList ...$trackingLists
     *
     * @return DeliveryNote
     */
    public function setTrackingLists(DeliveryNoteTrackingList ...$trackingLists): DeliveryNote
    {
        $this->trackingLists = $trackingLists;

        return $this;
    }

    /**
     * @return DeliveryNote
     */
    public function clearTrackingLists(): DeliveryNote
    {
        $this->trackingLists = [];

        return $this;
    }

    /**
     * @return string[]
     */
    public function getIdentificationStrings(): array
    {
        $this->setIdentificationStringBySubject(
            'customerOrderId',
            \sprintf('Related type CustomerOrder (JTL-Wawi PK = %d)', $this->customerOrderId->getHost())
        );

        return parent::getIdentificationStrings();
    }
}
