<?php

namespace Grapyak\Training;

class TrainingDocument
{
    private $input;

    private $output;

    public function __construct($input, $output)
    {
        $this->input  = $input;
        $this->output = $output;
    }

    public function getInput()
    {
        return $this->input;
    }

    public function getOutput()
    {
        return $this->output;
    }
}
