<?php

declare(strict_types=1);

namespace App\Message\Event;

use App\Message\Contracts\EventMessageInterface;
use App\Message\ToExternalMessageInterface;
use Happyr\MessageSerializer\Hydrator\HydratorInterface;
use Happyr\MessageSerializer\Transformer\TransformerInterface;
use Symfony\Component\Messenger\Envelope;

class MessageSentEvent implements EventMessageInterface, ToExternalMessageInterface, HydratorInterface, TransformerInterface
{
    private int $id;

    public function __construct() {}

    public static function create(int $id): self
    {
        $message = new self();
        $message->id = $id;

        return $message;
    }

    public function getVersion(): int
    {
        return 1;
    }

    public function getIdentifier(): string
    {
        return self::class;
    }

    public function getPayload($message): array
    {
        if ($message instanceof Envelope) {
            $message = $message->getMessage();
        }

        return [
            'id' => $message->id,
        ];
    }

    public function supportsTransform($message): bool
    {
        if ($message instanceof Envelope) {
            $message = $message->getMessage();
        }

        return $message instanceof self;
    }

    public function toMessage(array $payload, int $version): self
    {
        return self::create($payload['id']);
    }

    public function supportsHydrate(string $identifier, int $version): bool
    {
        return $identifier === self::class && $version === 1;
    }
}