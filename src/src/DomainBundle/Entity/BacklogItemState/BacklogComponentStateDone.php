<?php

namespace DomainBundle\Entity\BacklogItemState;

use DomainBundle\Entity\BacklogComponent;

class BacklogComponentStateDone extends BacklogComponentState
{
    /**
     * @param BacklogComponent $backlogComponent
     */
    public function cancel(BacklogComponent $backlogComponent): void
    {
        $backlogComponent->setCurrentState(new BacklogComponentStateTodo());
    }

    /**
     * @return bool
     */
    public function isFinished(): bool
    {
        return true;
    }
}
