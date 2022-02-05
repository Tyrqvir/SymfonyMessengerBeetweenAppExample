<?php

declare(strict_types=1);

namespace App\MessageBus;

use App\Message\Contracts\EventMessageInterface;
use App\Message\Contracts\ToExternalMessageInterface;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\MessageBusInterface;

trait EventBusTrait
{
    /** @required */
    public MessageBusInterface $eventBus;

    public function query(EventMessageInterface|ToExternalMessageInterface $event): Envelope
    {
        return $this->eventBus->dispatch($event);
    }
}