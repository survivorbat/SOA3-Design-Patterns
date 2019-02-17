<?php

namespace DomainBundle\Entity\SprintObserver;

use SplSubject;

class SprintSlackObserver implements \SplObserver
{

    /**
     * Receive update from subject
     * @link https://php.net/manual/en/splobserver.update.php
     * @param SplSubject $subject <p>
     * The <b>SplSubject</b> notifying the observer of an update.
     * </p>
     * @param array $eventData
     * @return void
     * @since 5.1.0
     */
    public function update(SplSubject $subject, array $eventData = [])
    {
        // TODO: Implement update() method.
    }
}