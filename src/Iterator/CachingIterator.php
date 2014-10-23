<?php

namespace Base\Core\Iterator;

/**
 * Wrap an Iterator and cache its values in an array
 *
 * Can rewind non-rewindable iterators.
 * Does not cache keys!
 */
class CachingIterator implements \Iterator
{
    /** @var \Iterator */
    private $innerIterator;

    private $array = [];

    private $position = 0;

    private $usingCache = false;

    public function __construct(\Iterator $iterator)
    {
        $this->innerIterator = $iterator;
    }

    public function current()
    {
        if (!$this->usingCache) {
            $this->array[$this->position] = $this->innerIterator->current();
        }

        return $this->array[$this->position];
    }

    public function next()
    {
        if (!$this->usingCache) {
            $this->innerIterator->next();
        }

        ++$this->position;
    }

    public function key()
    {
        if (!$this->usingCache) {
            return $this->innerIterator->key();
        }

        return $this->position;
    }

    public function valid()
    {
        if ($this->usingCache) {
            return isset($this->array[$this->position]);
        }

        $valid = $this->innerIterator->valid();

        if (!$valid) {
            $this->usingCache = true;
        }

        return $valid;
    }

    public function rewind()
    {
        $this->position = 0;
    }
}
