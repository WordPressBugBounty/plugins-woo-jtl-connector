<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package Jtl\Connector\Core\Compression
 */
namespace Jtl\Connector\Core\Compression;

use Jtl\Connector\Core\Exception\CompressionException;

/**
 * Gzip Compression
 *
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.de>
 */
class Gzip
{
    /**
     * @param string $file
     * @return string
     * @throws CompressionException
     */
    public function read(string $file): string
    {
        if (file_exists($file)) {
            $fp = fopen($file, "rb");
            
            if ($fp) {
                fseek($fp, -4, SEEK_END);
                $buf = fread($fp, 4);
                $arr = unpack("V", $buf);
                $gzsize = end($arr);
                fclose($fp);
                $gz = gzopen($file, "rb");
                $content = gzread($gz, $gzsize);
                gzclose($gz);
                
                return $content;
            } else {
                throw new CompressionException("Could not open file");
            }
        } else {
            throw new CompressionException("File not exists");
        }
    }

    /**
     * @param string $filename
     * @param string $content
     * @return bool
     */
    public function write(string $filename, string $content): bool
    {
        return false;
    }
}
