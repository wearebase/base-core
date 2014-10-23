<?php

namespace Base\Core\Extension;

class ExtensionNormalizerTest extends \PHPUnit_Framework_TestCase
{
    protected $manager;
    protected $normalizer;

    public function setUp()
    {
        $this->manager = new ExtensionManager();
        $this->normalizer = new ExtensionNormalizer($this->manager);
    }

    public function testNormalize()
    {
        $this->manager->add(new KeyedExtension('testData'));
        $collection = new ExtensionCollection();
        $collection['testData'] = [1, 2, 3];
        $normalized = $this->normalizer->normalize($collection);

        $this->assertEquals(['testData' => [1, 2, 3]], $normalized);
    }

    public function testSupportsNormalization()
    {
        $validObject = new ExtensionCollection();
        $invalidObject = new \StdClass();

        $this->assertTrue($this->normalizer->supportsNormalization($validObject));
        $this->assertFalse($this->normalizer->supportsNormalization($invalidObject));
    }

    public function testDenormalize()
    {
        $this->manager->add(new KeyedExtension('testData'));
        $normalized = ['testData' => [1, 2, 3]];
        $collection = $this->normalizer->denormalize($normalized, 'Base\\Core\\Extension\\ExtensionCollection');

        $this->assertInstanceOf('Base\\Core\\Extension\\ExtensionCollection', $collection);
        $this->assertEquals([1, 2, 3], $collection['testData']);
    }

    public function testSupportsDenormalization()
    {
        $validClass = 'Base\\Core\\Extension\\ExtensionCollection';
        $invalidClass = 'Base\\Core\\Extension\\NonExistentClass';

        $this->assertTrue($this->normalizer->supportsDenormalization([], $validClass));
        $this->assertFalse($this->normalizer->supportsDenormalization([], $invalidClass));
    }
}
