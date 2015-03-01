<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Grapyak\Bot\BotFactory;
use Grapyak\Message\Message;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context, SnippetAcceptingContext
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        $this->botFactory = new BotFactory();
    }

    /**
     * @Given saya punya bot
     */
    public function sayaPunyaBot()
    {
        $this->bot = $this->botFactory->createBot();
    }

    /**
     * @When saya suruh dia untuk :arg1
     */
    public function sayaSuruhDiaUntuk($arg1)
    {
        $this->response = $this->bot->tell(new Message((string)$arg1));
    }

    /**
     * @Then dia harus menjawab :arg1
     */
    public function diaHarusMenjawab($arg1)
    {
        \PHPUnit_Framework_Assert::assertEquals((string)$arg1, $this->response->getContent());
    }
}
