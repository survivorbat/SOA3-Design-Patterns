<?php

namespace ApplicationServiceBundle\Service\NotifyHandler;

abstract class NotifyHandler
{
    /**
     * @return void
     */
    final public function sendMessage(): void
    {
        $this->composeMessageContent();
        $this->composeMessage();
        $this->deliverMessage();
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
