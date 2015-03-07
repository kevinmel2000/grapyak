<?php

namespace Grapyak\Bot;

interface AnswerBuilderInterface
{
    public function build($rawAnswer, array $arguments);
}
