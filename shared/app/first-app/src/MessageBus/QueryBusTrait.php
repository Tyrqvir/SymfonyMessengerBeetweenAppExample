<?php

declare(strict_types=1);

namespace App\MessageBus;

use App\Message\Contracts\QueryMessageInterface;
use Symfony\Component\Messenger\HandleTrait;

trait QueryBusTrait
{
    use HandleTrait;

    public function query(QueryMessageInterface $query)
    {
        return $this->handle($query);
    }
}