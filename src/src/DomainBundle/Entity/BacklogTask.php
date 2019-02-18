<?php

namespace DomainBundle\Entity;

class BacklogTask extends BacklogComponent
{
    /**
     * @return bool
     */
    public function isFinished(): bool
    {
        return $this->getCurrentState()->isFinished();
    }
}
