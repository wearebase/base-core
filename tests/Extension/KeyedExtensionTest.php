<?php

namespace Base\Core\Extension;

class KeyedExtensionTest extends \PHPUnit_Framework_TestCase
{
    public function testGetKey()
    {
        $extension = new KeyedExtension('propertyKey');

        $this->assertEquals('propertyKey', $extension->getKey());
    }
}

