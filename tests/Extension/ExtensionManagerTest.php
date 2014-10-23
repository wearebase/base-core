<?php

namespace Base\Core\Extension;

class ExtensionManagerTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructor()
    {
        $manager = new ExtensionManager([
            new KeyedExtension('a'),
            new KeyedExtension('b'),
        ]);

        $this->assertCount(2, $manager->all());
    }

    public function testGetExtension()
    {
        $manager = new ExtensionManager();
        $manager->add(new KeyedExtension('a'));

        $this->assertInstanceOf('Base\\Core\\Extension\\KeyedExtension', $manager->get('a'));
    }

    public function testExtensionNotFound()
    {
        $this->setExpectedException('Exception');

        $manager = new ExtensionManager();
        $manager->get('extensionName');
    }
}

