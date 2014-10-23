<?php

namespace Base\Core\Extension;

class ExtensionTraitTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->extended = $this->getMockForTrait('Base\\Core\\Extension\\ExtensionTrait');
    }

    public function testSetExtensions()
    {
        $this->extended->setExtensions(new ExtensionCollection());
        $this->assertInstanceOf('Base\\Core\\Extension\\ExtensionCollection', $this->extended->getExtensions());
    }

    public function testAddExtension()
    {
        $this->extended->addExtension('a', new KeyedExtension('a'));
        $this->assertInstanceOf('Base\\Core\\Extension\\KeyedExtension', $this->extended->getExtension('a'));
    }

    public function testGetExtensions()
    {
        $this->assertInstanceOf('Base\\Core\\Extension\\ExtensionCollection', $this->extended->getExtensions());
    }

    public function testExtensionDefault()
    {
        $this->assertEquals('default', $this->extended->getExtension('nonExistent', 'default'));
    }
}

