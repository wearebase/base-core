<?php

namespace Base\Core\Iterator;

/**
 * Return an array of current values from $iterators
 *
 * next() is called on the least significant iterator
 */
class LowestSignificantGenerator
{
    /** @var \Iterator[] */
    private $iterators;

    public function __construct(array $iterators)
    {
        $this->iterators = $iterators;
    }

    /** @return \Generator */
    public function getGenerator()
    {
        $iterators = $this->iterators;

        while ($this->allIteratorsAreValid($iterators)) {
            $values = array_map(function (\Iterator $strategy) {
                return $strategy->current();
            }, $iterators);

            yield $values;

            for ($i = count($iterators) - 1; $i >= 0; $i--) {
                /** @var $iterator \Iterator */
                $iterator = $iterators[$i];
                $iterator->next();
                if ($iterator->valid()) {
                    break;
                }

                if ($i !== 0) {
                    $iterator->rewind();
                }
            }
        }
    }

    /**
     * @param \Iterator[] $iterators
     * @return bool
     */
    protected function allIteratorsAreValid($iterators)
    {
        foreach ($iterators as $iterator) {
            if (!$iterator->valid()) {
                return false;
            }
        }
        return true;
    }
}
