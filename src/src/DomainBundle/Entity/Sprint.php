<?php

namespace DomainBundle\Entity;

use DomainBundle\Entity\SprintState\SprintState;
use SplObserver;
use SplSubject;

class Sprint implements SplSubject
{
    /** @var SplObserver[]|array $sprintObservers */
    private $sprintObservers = [];
    /** @var SprintState $currentState */
    private $currentState;

    /**
     * @param SprintState $sprintState
     * @return Sprint
     */
    public function setCurrentState(SprintState $sprintState): Sprint
    {
        $this->currentState = $sprintState;
    }

    /**
     * @return bool
     */
    public function isEditable(): bool
    {
        return $this->currentState->isEditable();
    }

    /**
     * @param SplObserver $observer
     */
    public function attach(SplObserver $observer): void
    {
        $this->sprintObservers[] = $observer;
    }


    /**
     * @param SplObserver $observer
     * @return void
     */
    public function detach(SplObserver $observer): void
    {
        $this->sprintObservers = array_filter(
            $this->sprintObservers,
            function (SplObserver $observerInList) use ($observer) {
                return $observerInList !== $observer;
            }
        );
    }


    /**
     * @return void
     */
    public function notify(): void
    {
        foreach ($this->sprintObservers as $observer) {
            $observer->update($this);
        }
    }
}