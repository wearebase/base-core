<?php

namespace Base\Core\Extension;

interface ExtensionInterface
{
    public function getKey();
    public function normalize($serializer, $object, $format = null, array $context = []);
    public function denormalize($serializer, $data, $format = null, array $context = []);
}
