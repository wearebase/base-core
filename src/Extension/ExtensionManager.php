<?php

namespace Base\Core\Extension;

class ExtensionManager
{
    protected $extensions = [];

    public function __construct(array $extensions = [])
    {
        foreach ($extensions as $extension) {
            $this->add($extension);
        }
    }

    public function add(ExtensionInterface $extension)
    {
        $this->extensions[$extension->getKey()] = $extension;
    }

    public function all()
    {
        return $this->extensions;
    }

    /** @return ExtensionInterface */
    public function get($key)
    {
        if (!isset($this->extensions[$key])) {
            throw new \Exception("Entity Extension for $key does not exist");
        }

        return $this->extensions[$key];
    }
}
