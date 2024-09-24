<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Compression;

use InvalidArgumentException;
use Jtl\Connector\Core\Exception\CompressionException;
use Jtl\Connector\Core\Exception\FileNotFoundException;

/**
 * Zip
 *
 * @access public
 * @author Daniel Böhmer <daniel.boehmer@jtl-software.de>
 */
class Zip
{
    /**
     * @param string $sourceFile
     * @param string $targetFolder
     *
     * @return bool
     * @throws CompressionException
     * @throws FileNotFoundException
     * @throws InvalidArgumentException
     */
    public function extract(string $sourceFile, string $targetFolder): bool
    {
        if (!\class_exists('ZipArchive')) {
            throw new CompressionException('Class ZipArchive not found. PHP 5 >= 5.2.0, PECL zip >= 1.1.0 installed?');
        }

        if (!\file_exists($sourceFile)) {
            throw new FileNotFoundException(\sprintf('File (%s) not found', $sourceFile));
        }

        if (!\is_dir($targetFolder) || !\is_writable($targetFolder)) {
            throw new \InvalidArgumentException(
                \sprintf('Folder (%s) does not exists or is not writeable', $targetFolder)
            );
        }

        $archive = new \ZipArchive();
        if ($archive->open($sourceFile) === true) {
            $archive->extractTo($targetFolder);
            $archive->close();

            return true;
        }

        return false;
    }
}
