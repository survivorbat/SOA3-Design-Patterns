<?php

namespace DomainBundle\Entity\BacklogItemState;

use DomainBundle\Entity\BacklogComponent;

class BacklogComponentStateTodo extends BacklogComponentState
{
    /**
     * @param BacklogComponent $backlogComponent
     */
    public function start(BacklogComponent $backlogComponent): void
    {
        $backlogComponent->setCurrentState(new BacklogComponentStateDoing());
    }
}
