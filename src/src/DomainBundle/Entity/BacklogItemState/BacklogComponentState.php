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
    }

    /**
     * @param BacklogComponent $backlogComponent
     */
    public function finish(BacklogComponent $backlogComponent): void
    {
    }

    /**
     * @param BacklogComponent $backlogComponent
     */
    public function cancel(BacklogComponent $backlogComponent): void
    {
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
