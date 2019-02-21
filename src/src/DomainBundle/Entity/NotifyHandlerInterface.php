<?php

namespace DomainBundle\Entity;

interface NotifyHandlerInterface
{
    /**
     * @param string $message
     */
    public function sendMessage(string $message): void;
}
