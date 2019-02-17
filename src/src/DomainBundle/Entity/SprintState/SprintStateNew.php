<?php

namespace DomainBundle\Entity\SprintState;

class SprintStateNew extends SprintState
{
    /**
     * @return bool
     */
    public function isEditable(): bool
    {
        return false;
    }
}
