<?php

namespace Base\Core\Extension;

class ExtensionCollectionTest extends \PHPUnit_Framework_TestCase
{
    public function testArrayAccess()
    {
        $collection = new ExtensionCollection();
        $collection['key'] = 'value';
        $collection['old_key'] = 'old_value';
        unset($collection['old_key']);

        $this->assertTrue($collection->offsetExists('key'));
        $this->assertFalse($collection->offsetExists('nokey'));
        $this->assertEquals('value', $collection->offsetGet('key'));
        $this->assertFalse($collection->offsetExists('old_key'));
    }

    public function testIterator()
    {
        $collection = new ExtensionCollection();

        $this->assertInstanceOf('ArrayObject', $collection->getIterator());
    }
}

