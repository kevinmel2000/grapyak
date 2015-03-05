<?php

namespace Grapyak\Bot;

use Symfony\Component\ExpressionLanguage\ExpressionLanguage;
use Grapyak\ExpressionLanguage\FunctionProvider\DateTimeProvider;

class BotFactory
{
    public function createBot()
    {
        $trainingCollection = new \Grapyak\Training\ArrayTrainingCollection();

        $exprLang = new ExpressionLanguage();
        $exprLang->registerProvider(new DateTimeProvider());

        $answerBuilder      = new AnswerBuilder($exprLang);

        return new Bot($trainingCollection, $answerBuilder);
    }
}
