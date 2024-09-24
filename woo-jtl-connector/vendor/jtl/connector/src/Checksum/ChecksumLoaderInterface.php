<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Checksum;

interface ChecksumLoaderInterface
{
    /**
     * Loads the checksum
     *
     * @param string $endpointId
     * @param int    $type
     *
     * @return string
     */
    public function read($endpointId, $type): string;

    /**
     * Loads the checksum
     *
     * @param string $endpointId
     * @param int    $type
     * @param string $checksum
     *
     * @return boolean
     */
    public function write($endpointId, $type, $checksum): bool;

    /**
     * Loads the checksum
     *
     * @param string $endpointId
     * @param int    $type
     *
     * @return boolean
     */
    public function delete($endpointId, $type): bool;
}
