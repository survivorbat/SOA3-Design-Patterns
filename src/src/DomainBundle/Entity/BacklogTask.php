<?php

namespace DomainBundle\Entity;

class BacklogTask extends BacklogComponent
{
    /**
     * @return bool
     */
    public function canBeFinished(): bool
    {
        return $this->getCurrentState()->canBeFinished($this);
    }

    /**
     * @return int
     */
    public function getScore(): int
    {
        return $this->score;
    }
}
