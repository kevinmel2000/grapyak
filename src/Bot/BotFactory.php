<?php

namespace Grapyak\Bot;

class BotFactory
{
    public function createBot()
    {
        $trainingCollection = new \Grapyak\Training\ArrayTrainingCollection();
        $answerBuilder      = new AnswerBuilder();

        return new Bot($trainingCollection, $answerBuilder);
    }
}
