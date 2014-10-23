<?php

namespace Base\Core\Extension;

trait ExtensionTrait
{
    protected $extensions;

    public function setExtensions(ExtensionCollection $extensions)
    {
        $this->extensions = $extensions;
    }

    public function addExtension($key, $extension)
    {
        if (!isset($this->extensions)) {
            $this->extensions = new ExtensionCollection();
        }

        $this->extensions[$key] = $extension;
    }

    public function getExtensions()
    {
        if (!isset($this->extensions)) {
            $this->extensions = new ExtensionCollection();
        }

        return $this->extensions;
    }

    public function getExtension($key, $default = null)
    {
        if (!isset($this->extensions[$key])) {
            return $default;
        }

        return $this->extensions[$key];
    }
}
