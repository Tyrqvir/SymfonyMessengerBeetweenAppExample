<?php

declare(strict_types=1);

namespace App\MessageBus;

use App\Message\Contracts\CommandMessageInterface;
use Symfony\Component\Messenger\MessageBusInterface;

trait CommandBusTrait
{
    /** @required */
    public MessageBusInterface $commandBus;

    public function query(CommandMessageInterface $command): void
    {
        $this->commandBus->dispatch($command);
    }
}