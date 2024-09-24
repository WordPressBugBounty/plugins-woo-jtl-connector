<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Checksum;

use Jtl\Connector\Core\Model\Identity;

interface ChecksumInterface
{
    /**
     * @param Identity $foreignKey
     *
     * @return self
     */
    public function setForeignKey(Identity $foreignKey): self;

    /**
     * @return Identity
     */
    public function getForeignKey(): Identity;

    /**
     * @param string $endpoint
     *
     * @return self
     */
    public function setEndpoint(string $endpoint): self;

    /**
     * @return string
     */
    public function getEndpoint(): string;

    /**
     * @param string $host
     *
     * @return self
     */
    public function setHost(string $host): self;

    /**
     * @return string
     */
    public function getHost(): string;

    /**
     * @param int $type
     *
     * @return self
     */
    public function setType(int $type): self;

    /**
     * @return int
     */
    public function getType(): int;

    /**
     * @param boolean $hasChanged
     *
     * @return self
     */
    public function setHasChanged(bool $hasChanged): self;

    /**
     * @return boolean
     */
    public function hasChanged(): bool;
}
