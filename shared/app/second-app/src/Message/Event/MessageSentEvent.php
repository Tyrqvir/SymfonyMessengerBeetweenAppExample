<?php

declare(strict_types=1);

namespace App\Message\Event;

use App\Message\Contracts\EventMessageInterface;
use Happyr\MessageSerializer\Hydrator\HydratorInterface;

class MessageSentEvent implements EventMessageInterface, HydratorInterface
{
    private int $id;

    public function __construct()
    {
    }

    public static function create(int $id): self
    {
        $message = new self();
        $message->id = $id;

        return $message;
    }

    public function toMessage(array $payload, int $version): self
    {
        return self::create($payload['id']);
    }

    public function supportsHydrate(string $identifier, int $version): bool
    {
        return $identifier === self::class && $version === 1;
    }

    public function getId(): int
    {
        return $this->id;
    }
}