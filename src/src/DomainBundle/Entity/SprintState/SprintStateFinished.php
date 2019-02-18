<?php

namespace DomainBundle\Entity\SprintState;

use DomainBundle\Entity\Sprint;

class SprintStateFinished extends SprintState
{
    /**
     * @param Sprint $sprint
     */
    public function close(Sprint $sprint): void
    {
        $sprint->setCurrentState(new SprintStateClosed());
    }

    /**
     * @param Sprint $sprint
     */
    public function cancel(Sprint $sprint): void
    {
        $sprint->setCurrentState(new SprintStateCanceled());
    }
}
