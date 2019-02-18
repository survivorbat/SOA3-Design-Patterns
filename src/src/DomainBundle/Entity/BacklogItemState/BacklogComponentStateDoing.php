<?php

namespace DomainBundle\Entity\BacklogItemState;

use DomainBundle\Entity\BacklogComponent;
use DomainBundle\Entity\BacklogTask;
use http\Exception\InvalidArgumentException;

class BacklogComponentStateDoing extends BacklogComponentState
{
    /**
     * @param BacklogComponent $backlogComponent
     */
    public function finish(BacklogComponent $backlogComponent): void
    {
        if ($this->canBeFinished($backlogComponent)) {
            $backlogComponent->setCurrentState(new BacklogComponentStateDone());
        } else {
            throw new InvalidArgumentException('It is not possible to finish an item that has unfinished subitems');
        }
    }

    /**
     * @param BacklogComponent $backlogComponent
     * @return bool
     */
    public function canBeFinished(BacklogComponent $backlogComponent): bool
    {
        return null === $backlogComponent->getChildren() || $backlogComponent->isFinished();
    }

    /**
     * @param BacklogComponent $backlogComponent
     */
    public function cancel(BacklogComponent $backlogComponent): void
    {
        $backlogComponent->setCurrentState(new BacklogComponentStateTodo());
    }
}
