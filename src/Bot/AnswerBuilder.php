<?php

namespace Grapyak\Bot;

use Symfony\Component\ExpressionLanguage\ExpressionLanguage;

class AnswerBuilder implements AnswerBuilderInterface
{
    private $lang;

    public function __construct(ExpressionLanguage $exprLang)
    {
        $this->lang = $exprLang;
    }

    public function build($rawAnswer, array $arguments)
    {
        $output = $rawAnswer;

        // echo
        if (preg_match('/echo\((.*)\) /', $output, $matches)) {
            $echoExpr = $matches[1];

            $count = count($arguments);
            for ($i = 1; $i < $count; $i++) {
                $echoExpr = str_replace('{:'.$i.'}', $arguments[$i], $echoExpr);
            }

            $output = str_replace($matches[0], $echoExpr.' ', $output);
        }

        // eval
        if (preg_match('/eval\((.*)\)/', $output, $matches)) {
            $evalExpr = $matches[1];

            $count = count($arguments);
            for ($i = 1; $i < $count; $i++) {
                $evalExpr = str_replace('{:'.$i.'}', $arguments[$i], $evalExpr);
            }

            $result = $this->lang->evaluate($evalExpr);
            $output = str_replace($matches[0], $result, $output);
        }

        return $output;
    }

    public function getExpressionLanguage()
    {
        return $this->lang;
    }
}
