<?php

namespace Grapyak\Bot;

use Grapyak\Message\Message;
use Grapyak\Training\TrainingDocument;

class Bot
{
    private $trainingDocuments = [];

    private $answerBuilder;

    public function __construct()
    {
        $this->answerBuilder = new AnswerBuilder();
    }

    public function tell(Message $message)
    {
        foreach ($this->trainingDocuments as $training) {
            if (preg_match('/'.$training->getInput().'/i', $message->getContent(), $matches)) {
                //var_dump($matches);
                return new Message($this->answerBuilder->build($training->getOutput(), $matches));
            }
        }

        return new Message('2');
    }

    public function train(TrainingDocument $document)
    {
        $this->trainingDocuments[] = $document;
    }

    public function getTrainingDocuments()
    {
        return $this->trainingDocuments;
    }
}
