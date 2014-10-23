<?php

namespace Base\Core\Iterator;


class CachingIteratorTest extends \PHPUnit_Framework_TestCase
{
    public function testGenerator()
    {
        $generator = call_user_func(function () {
            yield 'a';
            yield 'b';
            yield 'c';
        });

        // https://github.com/facebook/hhvm/issues/1871
        if (defined('HHVM_VERSION')) {
            $generator->next();
        }

        $cachingIterator = new CachingIterator($generator);

        $expected = [0 => 'a', 1 => 'b', 2 => 'c'];

        // initial foreach, using the Generator
        $actual = [];
        foreach ($cachingIterator as $k => $v) {
            $actual[$k] = $v;
        }
        $this->assertSame($expected, $actual);

        // foreach using the cached data
        $actual = [];
        foreach ($cachingIterator as $k => $v) {
            $actual[$k] = $v;
        }
        $this->assertSame($expected, $actual);
    }

    public function testArrayIterator()
    {
        $arrayIterator = new \ArrayIterator(['a', 'b', 'c']);
        $cachingIterator = new CachingIterator($arrayIterator);

        $expected = ['a', 'b', 'c'];

        // initial foreach, using the Generator
        $actual = [];
        foreach ($cachingIterator as $v) {
            $actual[] = $v;
        }
        $this->assertSame($expected, $actual);

        // foreach using the cached data
        $actual = [];
        foreach ($cachingIterator as $v) {
            $actual[] = $v;
        }
        $this->assertSame($expected, $actual);
    }
}
