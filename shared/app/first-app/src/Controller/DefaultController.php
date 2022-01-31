<?php

declare(strict_types=1);

namespace App\Controller;

use App\Message\Event\MessageSentEvent;
use App\MessageBus\EventBusTrait;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    use EventBusTrait;

    /**
     * @Route("/", name="base", methods={"GET"})
     */
    public function show(): Response
    {
        $this->query(MessageSentEvent::create(155));

        return new Response('ok');
    }
}