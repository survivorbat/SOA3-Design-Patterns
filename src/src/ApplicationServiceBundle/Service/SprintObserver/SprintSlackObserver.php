<?php

namespace ApplicationServiceBundle\Entity\SprintObserver;

use SplSubject;

class SprintSlackObserver implements \SplObserver
{
    /**
     * @param SplSubject $subject
     * @param array $eventData
     */
    public function update(SplSubject $subject, array $eventData = []): void
    {
        // TODO: Implement update() method.
    }
}
