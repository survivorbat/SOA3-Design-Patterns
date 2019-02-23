<?php

namespace DomainBundle\Entity\SprintState;

class SprintStateClosed extends SprintState
{
    /**
     * @return string
     */
    public function getStateDescription(): string
    {
        return 'Deze sprint is volledig afgerond.';
    }

    /**
     * @return string
     */
    public function getStateTitle(): string
    {
        return 'Closed';
    }
}
