<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Compression
 */
namespace Jtl\Connector\Core\Compression;

/**
 * Compression Interface
 *
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.de> *
 */
interface CompressionInterface
{
    /**
     * Read content from compressed file
     *
     * @param string $file
     * @return string
     */
    public function read(string $file): string;
    
    /**
     * Write compressed content to file
     *
     * @param string $file
     * @param string $content
     * @return bool
     */
    public function write(string $file, string $content): bool;
}
