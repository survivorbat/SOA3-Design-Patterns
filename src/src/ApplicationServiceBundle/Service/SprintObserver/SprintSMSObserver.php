<?php

namespace ApplicationServiceBundle\Service\SprintObserver;

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
     */
    public function update(SplSubject $subject): void
    {
        if ($subject->getCurrentState()->getStateTitle() == "New" && $subject->getPrevState()->getStateTitle() == "Closed") {
            $this->notifyHandler->sendMessage("");
        }
    }
}
