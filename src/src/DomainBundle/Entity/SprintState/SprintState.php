<?php

namespace DomainBundle\Entity\SprintState;

use DomainBundle\Entity\Sprint;

abstract class SprintState
{
    /**
     * @return bool
     */
    public function isEditable(): bool
    {
        return false;
    }

    /**
     * @param Sprint $sprint
     */
    public function finish(Sprint $sprint): void
    {
    }

    /**
     * @param Sprint $sprint
     */
    public function close(Sprint $sprint): void
    {
    }

    /**
     * @param Sprint $sprint
     */
    public function cancel(Sprint $sprint): void
    {
    }

    /**
     * @param Sprint $sprint
     */
    public function start(Sprint $sprint): void
    {
    }
}
