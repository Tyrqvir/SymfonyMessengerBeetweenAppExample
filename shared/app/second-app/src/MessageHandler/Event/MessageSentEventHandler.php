<?php

namespace App\MessageHandler\Event;

use App\Message\Event\MessageSentEvent;
use App\MessageHandler\Contracts\EventHandlerInterface;
use Psr\Log\LoggerInterface;

class MessageSentEventHandler implements EventHandlerInterface
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function __invoke(MessageSentEvent $message)
    {
        $this->logger->info(sprintf('Data from external message %d', $message->getId()));
    }
}