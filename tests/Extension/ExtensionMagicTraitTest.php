<?php

namespace Base\Core\Extension;

class ExtensionMagicTraitTest extends \PHPUnit_Framework_TestCase
{
    public function testGetExtension()
    {
        $extended = $this->getMockForTrait('Base\\Core\\Extension\\ExtensionMagicTrait');
        $extended->extensions = new ExtensionCollection();
        $extended->extensions['testExtension'] = 'testData';

        $this->assertEquals('testData', $extended->getTestExtension());
    }

    public function testExtensionDefault()
    {
        $extended = $this->getMockForTrait('Base\\Core\\Extension\\ExtensionMagicTrait');
        $extended->extensions = new ExtensionCollection();

        $this->assertEquals('default', $extended->getTestExtension('default'));
    }
}

