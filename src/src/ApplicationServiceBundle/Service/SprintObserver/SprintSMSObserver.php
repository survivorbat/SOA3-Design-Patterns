<?php

namespace ApplicationServiceBundle\Entity\SprintObserver;

use ApplicationServiceBundle\Service\NotifyHandler\NotifyHandler;
use SplObserver;
use SplSubject;

class SprintSMSObserver implements SplObserver
{
    /** @var NotifyHandler $notifyHandler */
    private $notifyHandler;

    /**
     * SprintEmailObserver constructor.
     * @param NotifyHandler $notifyHandler
     */
    public function __construct(NotifyHandler $notifyHandler)
    {
        $this->notifyHandler = $notifyHandler;
    }

    /**
     * @param SplSubject $subject
     * @param array $eventData
     */
    public function update(SplSubject $subject, array $eventData = []): void
    {
        $this->notifyHandler->sendMessage($eventData['message']);
    }
}
