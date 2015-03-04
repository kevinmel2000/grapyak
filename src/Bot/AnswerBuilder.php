<?php

namespace Grapyak\Bot;

use Symfony\Component\ExpressionLanguage\ExpressionLanguage;
use Grapyak\ExpressionLanguage\FunctionProvider\DateTimeProvider;

class AnswerBuilder
{
    private $lang = [];

    public function __construct()
    {
        $this->lang = new ExpressionLanguage();
        $this->lang->registerProvider(new DateTimeProvider());
    }

    public function build($answer, array $arg)
    {
        $output = $answer;

        // echo
        if (preg_match('/echo\((.*)\) /', $output, $matches)) {
            $echoExpr = $matches[1];

            for ($i = 1; $i < count($arg); $i++) {
                $echoExpr = str_replace('{:'.$i.'}', $arg[$i], $echoExpr);
            }

            $output = str_replace($matches[0], $echoExpr.' ', $output);
        }

        // eval
        if (preg_match('/eval\((.*)\)/', $output, $matches)) {
            $evalExpr = $matches[1];

            for ($i = 1; $i < count($arg); $i++) {
                $evalExpr = str_replace('{:'.$i.'}', $arg[$i], $evalExpr);
            }

            $result = $this->lang->evaluate($evalExpr);
            $output = str_replace($matches[0], $result, $output);
        }

        return $output;
    }
}
