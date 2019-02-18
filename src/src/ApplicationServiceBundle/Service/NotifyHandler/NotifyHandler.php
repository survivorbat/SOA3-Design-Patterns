<?php

namespace ApplicationServiceBundle\Service\NotifyHandler;

use DomainBundle\Entity\NotifyHandlerInterface;

abstract class NotifyHandler implements NotifyHandlerInterface
{
    /**
     * @param string $message
     * @return void
     */
    final public function sendMessage(string $message): void
    {
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
