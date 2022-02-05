<?php

namespace App\MessageHandler\Event;

use App\Message\Contracts\EventMessageInterface;
use App\MessageHandler\Contracts\EventHandlerInterface;

class MessageSentEventHandler implements EventHandlerInterface
{
    public function __invoke(EventMessageInterface $message)
    {
        dd($message);
    }
}