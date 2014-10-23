<?php

namespace Base\Core\Extension;

class AbstractExtensionTest extends \PHPUnit_Framework_TestCase
{
    public function testNormalizeDenormlize()
    {
        $extension = $this->getMockForAbstractClass('Base\\Core\\Extension\\AbstractExtension');

        $this->assertEquals(['test' => 'data'], $extension->normalize(null, ['test' => 'data']));
        $this->assertEquals(['test' => 'data'], $extension->denormalize(null, ['test' => 'data']));
    }
}

