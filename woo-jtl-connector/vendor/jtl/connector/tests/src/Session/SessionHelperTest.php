<?php

declare(strict_types=1);

namespace Jtl\Connector\Core\Test\Session;

use Jtl\Connector\Core\Session\SessionHelper;
use PHPUnit\Framework\TestCase;

class SessionHelperTest extends TestCase
{
    public function testHas(): void
    {
        $helper                 = new SessionHelper('foo');
        $_SESSION['foo']['bar'] = 'boofar';
        $_SESSION['foo']['you'] = 'yalla';
        $this->assertTrue($helper->has('bar'));
        $this->assertTrue($helper->has('you'));
    }

    public function testHasNot(): void
    {
        $helper = new SessionHelper('foo');
        $this->assertFalse($helper->has('bar'));
        $this->assertFalse($helper->has('yes'));
    }

    public function testGet(): void
    {
        $helper                 = new SessionHelper('foo');
        $_SESSION['foo']['bar'] = 'vaaaaalue';
        $_SESSION['foo']['och'] = 'taataa';
        $this->assertEquals('vaaaaalue', $helper->get('bar'));
        $this->assertEquals('taataa', $helper->get('och'));
    }

    public function testGetDefault(): void
    {
        $helper = new SessionHelper('foo');
        $this->assertEquals('baras', $helper->get('foo', 'baras'));
        $this->assertEquals('faburus', $helper->get('och', 'faburus'));
    }

    public function testSet(): void
    {
        $helper = new SessionHelper('yo');
        $helper->set('lo', 'miau');
        $this->assertArrayHasKey('lo', $_SESSION['yo']);
        $this->assertEquals('miau', $_SESSION['yo']['lo']);
    }

    public function testUnset(): void
    {
        $helper                   = new SessionHelper('tests');
        $_SESSION['tests']['foo'] = 'bar';
        $this->assertArrayHasKey('foo', $_SESSION['tests']);
        $helper->unset('foo');
        $this->assertArrayNotHasKey('foo', $_SESSION['tests']);
    }

    public function testCreateByObjectClass(): void
    {
        $expectedNamespace           = \ZipArchive::class;
        $helper                      = SessionHelper::createByObjectClass(new \ZipArchive());
        $reflectionClass             = new \ReflectionClass($helper);
        $reflectionPropertyNamespace = $reflectionClass->getProperty('namespace');
        $reflectionPropertyNamespace->setAccessible(true);
        $actualNamespace = $reflectionPropertyNamespace->getValue($helper);
        $this->assertEquals($expectedNamespace, $actualNamespace);
    }

    protected function setUp(): void
    {
        parent::setUp();
        unset($_SESSION);
    }
}
