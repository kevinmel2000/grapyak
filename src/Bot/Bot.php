<?php

namespace Grapyak\Bot;

use Grapyak\Message\Message;
use Grapyak\Training\TrainingDocument;
use Grapyak\Training\TrainingCollection;

class Bot
{
    private $trainingCollection;

    private $answerBuilder;

    public function __construct(
        TrainingCollection $trainingCollection,
        AnswerBuilder $answerBuilder
    ) {
        $this->trainingCollection = $trainingCollection;
        $this->answerBuilder      = $answerBuilder;
    }

    public function tell(Message $message)
    {
        foreach ($this->trainingCollection as $training) {
            if (preg_match('/'.$training->getInput().'/i', $message->getContent(), $matches)) {
                return new Message($this->answerBuilder->build($training->getOutput(), $matches));
            }
        }
    }

    public function train(TrainingDocument $document)
    {
        $this->trainingCollection->add($document);
    }

    public function getTrainingCollection()
    {
        return $this->trainingCollection;
    }

    public function getAnswerBuilder()
    {
        return $this->answerBuilder;
    }
}
