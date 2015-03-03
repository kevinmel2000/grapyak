<?php

namespace Grapyak\Training;

class ArrayTrainingCollection implements TrainingCollection
{
    private $collection;

    public function add($training)
    {
        $this->collection[] = $training;
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->collection);
    }
}
