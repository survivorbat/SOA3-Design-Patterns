<?php

namespace DomainBundle\Entity\BacklogItemState;

use DomainBundle\Entity\BacklogComponent;

abstract class BacklogComponentState
{
    public function start(BacklogComponent $backlogComponent): void
    {
    }

    public function finish(BacklogComponent $backlogComponent): void
    {
    }
}
