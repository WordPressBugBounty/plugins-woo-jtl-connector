<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Model;

use JMS\Serializer\Annotation as Serializer;
use Jtl\Connector\Core\Checksum\ChecksumInterface;

/**
 * Ack
 *
 * @access     public
 * @package    Jtl\Connector\Core\Model
 * @subpackage Internal
 * @Serializer\AccessType("public_method")
 */
class Ack extends Identities
{
    /**
     * @var Checksum[]
     * @Serializer\Type("array<Jtl\Connector\Core\Model\Checksum>")
     * @Serializer\SerializedName("checksums")
     * @Serializer\AccessType("reflection")
     */
    protected array $checksums = [];

    /**
     * @param Checksum $checksum
     *
     * @return Ack
     */
    public function addChecksum(Checksum $checksum): Ack
    {
        $this->checksums[] = $checksum;

        return $this;
    }

    /**
     * @return Checksum[]
     */
    public function getChecksums(): array
    {
        return $this->checksums;
    }

    /**
     * @return Ack
     */
    public function clearChecksums(): Ack
    {
        $this->checksums = [];

        return $this;
    }
}
