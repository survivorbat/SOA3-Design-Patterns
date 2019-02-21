<?php

namespace DomainBundle\Entity\BacklogItemState;

use DomainBundle\Entity\BacklogComponent;

abstract class BacklogComponentState
{
    /**
     * @param BacklogComponent $backlogComponent
     */
    public function start(BacklogComponent $backlogComponent): void
    {
        throw new \BadMethodCallException('This state method has not been implemented.');
    }

    /**
     * @param BacklogComponent $backlogComponent
     */
    public function finish(BacklogComponent $backlogComponent): void
    {
        throw new \BadMethodCallException('This state method has not been implemented.');
    }

    /**
     * @param BacklogComponent $backlogComponent
     */
    public function cancel(BacklogComponent $backlogComponent): void
    {
        throw new \BadMethodCallException('This state method has not been implemented.');
    }

    /**
     * @return bool
     */
    public function isFinished(): bool
    {
        return false;
    }

    /**
     * @param BacklogComponent $backlogComponent
     * @return bool
     */
    public function canBeFinished(BacklogComponent $backlogComponent): bool
    {
        return false;
    }
}
