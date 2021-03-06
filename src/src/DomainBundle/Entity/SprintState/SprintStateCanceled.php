<?php

namespace DomainBundle\Entity\SprintState;

class SprintStateCanceled extends SprintState
{
    /**
     * @return string
     */
    public function getStateDescription(): string
    {
        return 'This sprint has been canceled.';
    }

    /**
     * @return string
     */
    public function getStateTitle(): string
    {
        return 'Canceled';
    }
}
