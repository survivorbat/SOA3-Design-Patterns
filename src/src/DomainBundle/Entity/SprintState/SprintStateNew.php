<?php

namespace DomainBundle\Entity\SprintState;

use DomainBundle\Entity\Sprint;

class SprintStateNew extends SprintState
{
    /**
     * @param Sprint $sprint
     */
    public function start(Sprint $sprint): void
    {
        $sprint->setCurrentState(new SprintStateActive());
    }

    /**
     * @return bool
     */
    public function isEditable(): bool
    {
        return true;
    }
}
