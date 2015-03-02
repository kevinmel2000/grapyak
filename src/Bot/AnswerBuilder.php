<?php

namespace Grapyak\Bot;

use Symfony\Component\ExpressionLanguage\ExpressionLanguage;

class AnswerBuilder
{
    public function __construct()
    {
        $this->lang = new ExpressionLanguage();
    }

    public function build($answer, array $arg)
    {
        $output = $answer;

        // echo
        if (preg_match('/echo\((.*)\) /', $output, $matches)) {
            $result = $this->lang->evaluate($matches[1], array('arg' => $arg));
            $output = str_replace($matches[0], $result.' ', $output);
        }

        // eval
        if (preg_match('/eval\((.*)\)/', $output, $matches)) {
            $result = $this->lang->evaluate($arg[1]);
            $output = str_replace($matches[0], $result, $output);
        }

        return $output;
    }
}
