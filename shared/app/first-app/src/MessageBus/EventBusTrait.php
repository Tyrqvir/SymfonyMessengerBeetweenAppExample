<?php

declare(strict_types=1);

namespace App\MessageBus;

use App\Message\Contracts\EventMessageInterface;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\MessageBusInterface;

trait EventBusTrait
{
    /** @required */
    public MessageBusInterface $eventBus;

    public function query(EventMessageInterface $event): Envelope
    {
        return $this->eventBus->dispatch($event);
    }
}