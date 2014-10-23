<?php

namespace Base\Core\Extension;

class KeyedExtension extends AbstractExtension
{
    protected $key;

    public function __construct($key)
    {
        $this->key = $key;
    }

    public function getKey()
    {
        return $this->key;
    }
}
