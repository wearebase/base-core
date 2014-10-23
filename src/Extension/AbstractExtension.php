<?php

namespace Base\Core\Extension;

abstract class AbstractExtension implements ExtensionInterface
{
    public function normalize($serializer, $object, $format = null, array $context = [])
    {
        return $object;
    }

    public function denormalize($serializer, $data, $format = null, array $context = [])
    {
        return $data;
    }
}
