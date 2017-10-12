<?php

namespace Base\Core\Extension;

use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class ExtensionNormalizer extends SerializerAwareNormalizer implements NormalizerInterface, DenormalizerInterface
{
    protected $manager;

    public function __construct(ExtensionManager $manager)
    {
        $this->manager = $manager;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $normalized = [];

        foreach ($object->getIterator() as $key => $extension) {
            $normalized[$key] = $this->manager->get($key)->normalize(
                $this->serializer,
                $extension,
                $format,
                $context
            );
        }

        return $normalized;
    }

    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && get_class($data) === 'Base\\Core\\Extension\\ExtensionCollection';
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        $denormalized = new $class();
        $extensions = array_intersect_key($data, $this->manager->all());

        foreach ($extensions as $key => $extension) {
            $denormalized[$key] = $this->manager->get($key)->denormalize(
                $this->serializer,
                $extension,
                $format,
                $context
            );
        }

        return $denormalized;
    }

    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'Base\\Core\\Extension\\ExtensionCollection';
    }
}
