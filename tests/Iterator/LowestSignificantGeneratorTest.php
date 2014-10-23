<?php

namespace Base\Core\Iterator;

class LowestSignificantGeneratorTest extends \PHPUnit_Framework_TestCase
{
    public function testArrayIterators()
    {
        $a = new \ArrayIterator([100, 200]);
        $b = new \ArrayIterator([10, 20]);
        $c = new \ArrayIterator([1, 2]);

        $expected = [
            [100, 10, 1],
            [100, 10, 2],
            [100, 20, 1],
            [100, 20, 2],
            [200, 10, 1],
            [200, 10, 2],
            [200, 20, 1],
            [200, 20, 2],
        ];

        $generator = new LowestSignificantGenerator([$a, $b, $c]);

        $actual = iterator_to_array($generator->getGenerator());

        $this->assertSame($expected, $actual);
    }

    public function testInvalidIterator()
    {
        $a = new \ArrayIterator([100, 200]);
        $b = new \ArrayIterator([10, 20]);
        $c = new \ArrayIterator([]);

        $expected = [];

        $generator = new LowestSignificantGenerator([$a, $b, $c]);

        $actual = iterator_to_array($generator->getGenerator());

        $this->assertSame($expected, $actual);

        $a = new \ArrayIterator([]);
        $b = new \ArrayIterator([10, 20]);
        $c = new \ArrayIterator([1, 2]);

        $expected = [];

        $generator = new LowestSignificantGenerator([$a, $b, $c]);

        $actual = iterator_to_array($generator->getGenerator());

        $this->assertSame($expected, $actual);
    }

}
