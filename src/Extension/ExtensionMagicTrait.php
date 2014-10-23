<?php

namespace Base\Core\Extension;

trait ExtensionMagicTrait
{
    public function __call($name, $arguments)
    {
        $extension = lcfirst(substr($name, 3));
        $default = isset($arguments[0]) ? $arguments[0] : null;

        if (!isset($this->extensions[$extension])) {
            return $default;
        }

        return $this->extensions[$extension];
    }
}
