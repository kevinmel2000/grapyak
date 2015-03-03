<?php

namespace Grapyak\Training;

interface TrainingCollection extends \IteratorAggregate
{
    public function add($training);
}
