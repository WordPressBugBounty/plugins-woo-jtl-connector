<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Test\Exception;

use Jtl\Connector\Core\Exception\PartialSyncException;
use Jtl\Connector\Core\SyncError\SyncErrorEntry;
use PHPUnit\Framework\TestCase;

class PartialSyncExceptionTest extends TestCase
{
    /**
     * @return void
     */
    public function testMessageContainsErrorCount(): void
    {
        $errors = [
            new SyncErrorEntry('Product', 'push', '42', 'Something broke'),
            new SyncErrorEntry('Category', 'delete', '7', 'Category not found'),
        ];

        $exception = new PartialSyncException($errors);
        $this->assertStringContainsString('2 error(s)', $exception->getMessage());
    }

    /**
     * @return void
     */
    public function testMessageContainsAllErrors(): void
    {
        $errors = [
            new SyncErrorEntry('Product', 'push', '42', 'Something broke'),
            new SyncErrorEntry('Category', 'delete', '', 'Category not found'),
        ];

        $exception = new PartialSyncException($errors);
        $message   = $exception->getMessage();

        $this->assertStringContainsString('[Product.push]', $message);
        $this->assertStringContainsString('entity=42', $message);
        $this->assertStringContainsString('Something broke', $message);
        $this->assertStringContainsString('[Category.delete]', $message);
        $this->assertStringContainsString('entity=N/A', $message);
        $this->assertStringContainsString('Category not found', $message);
    }

    /**
     * @return void
     */
    public function testGetErrorsReturnsOriginalEntries(): void
    {
        $errors = [
            new SyncErrorEntry('Product', 'push', '42', 'Something broke'),
        ];

        $exception = new PartialSyncException($errors);
        $this->assertSame($errors, $exception->getErrors());
    }

    /**
     * @return void
     */
    public function testSingleError(): void
    {
        $errors    = [new SyncErrorEntry('Product', 'push', '1', 'Failed')];
        $exception = new PartialSyncException($errors);

        $this->assertStringContainsString('1 error(s)', $exception->getMessage());
        $this->assertStringContainsString('1) [Product.push]', $exception->getMessage());
    }
}
