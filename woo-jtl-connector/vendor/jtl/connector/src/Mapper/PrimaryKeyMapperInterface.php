<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Mapper;

interface PrimaryKeyMapperInterface
{
    /**
     * Host ID getter
     *
     * @param integer $type
     * @param string  $endpointId
     *
     * @return integer|null
     */
    public function getHostId(int $type, string $endpointId): ?int;

    /**
     * Endpoint ID getter
     *
     * @param integer $type
     * @param integer $hostId
     *
     * @return string|null
     */
    public function getEndpointId(int $type, int $hostId): ?string;

    /**
     * Save link to database
     *
     * @param integer $type
     * @param string  $endpointId
     * @param integer $hostId
     *
     * @return boolean
     */
    public function save(int $type, string $endpointId, int $hostId): bool;

    /**
     * Delete link from database
     *
     * @param integer     $type
     * @param string|null $endpointId
     * @param int|null    $hostId
     *
     * @return boolean
     */
    public function delete(int $type, string $endpointId = null, int $hostId = null): bool;

    /**
     * Clears the entire link table
     *
     * @param integer|null $type
     *
     * @return boolean
     */
    public function clear(int $type = null): bool;
}
