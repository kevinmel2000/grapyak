<?php

namespace Grapyak\Message;

use Zend\Stdlib\Message as ZendMessage;

class Message extends ZendMessage implements MessageInterface
{
    public function __construct($content)
    {
        $this->setContent($content);
    }
}
