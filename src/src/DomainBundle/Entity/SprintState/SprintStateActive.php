<?php

namespace DomainBundle\Entity\SprintState;

use DomainBundle\Entity\Sprint;

class SprintStateActive extends SprintState
{
    /**
     * @param Sprint $sprint
     */
    public function cancel(Sprint $sprint): void
    {
        $sprint->setCurrentState(new SprintStateCanceled());
    }
}
