<?php

namespace Base\Core\Extension;

class ExtensionCollection implements \ArrayAccess
{
    protected $array;

    public function __construct($input = [], $flags = 0, $iteratorClass = 'ArrayIterator')
    {
        $this->array = new \ArrayObject($input, $flags, $iteratorClass);
    }

    public function offsetExists($offset)
    {
        return $this->array->offsetExists($offset);
    }

    public function offsetGet($offset)
    {
        return $this->array->offsetGet($offset);
    }

    public function offsetSet($offset, $value)
    {
        $this->array->offsetSet($offset, $value);
    }

    public function offsetUnset($offset)
    {
        $this->array->offsetUnset($offset);
    }

    public function getIterator()
    {
        return $this->array;
    }
}
