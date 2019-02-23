<?php

namespace ApplicationServiceBundle\Service\NotifyHandler;

use DomainBundle\Entity\NotifyHandlerInterface;
use DomainBundle\Entity\User;

abstract class NotifyHandler implements NotifyHandlerInterface
{
    /** @var string $message */
    protected $message;

    /**
     * @return void
     */
    public function sendMessage(string $message): void
    {
        $this->message = $message;

        $this->collectReceiverData();
        $this->composeMessageContent();
        $this->composeMessage();
        $this->deliverMessage();
    }

    /**
     * @return void
     */
    final protected function collectReceiverData(): void
    {
        // TODO: Implement collect
    }

    /**
     * @return void
     */
    abstract protected function composeMessageContent(): void;

    /**
     * @return void
     */
    abstract protected function deliverMessage(): void;

    /**
     * @return void
     */
    final protected function composeMessage(): void
    {
        // TODO: Implement footer / header
    }
}
