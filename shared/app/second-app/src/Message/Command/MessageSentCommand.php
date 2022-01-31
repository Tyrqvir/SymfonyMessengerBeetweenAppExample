<?php

declare(strict_types=1);

namespace App\Message\Command;

use App\Message\Contracts\CommandMessageInterface;
use App\Message\ToExternalMessageInterface;

class MessageSentCommand implements CommandMessageInterface, ToExternalMessageInterface
{
    private int $content;

    public function __construct(int $content)
    {
        $this->content = $content;
    }

    public function getContent(): int
    {
        return $this->content;
    }
}