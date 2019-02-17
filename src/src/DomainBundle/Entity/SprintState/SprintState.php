<?php

namespace DomainBundle\Entity\SprintState;

abstract class SprintState
{
    /**
     * @return bool
     */
    public function isEditable(): bool
    {
        return false;
    }
}
