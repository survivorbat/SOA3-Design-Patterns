<?php

namespace DomainBundle\Entity;

use DomainBundle\Entity\SprintState\SprintState;
use SplObserver;
use SplSubject;

class Sprint implements SplSubject, \Serializable
{
    /** @var string $id */
    private $id;
    /** @var SplObserver[]|array $sprintObservers */
    private $sprintObservers = [];
    /** @var EntityExportHandler $exportHandler */
    private $exportHandler;
    /** @var SprintState $currentState */
    private $currentState;

    /**
     * Sprint constructor.
     * @param EntityExportHandler $exportHandler
     */
    public function __construct(EntityExportHandler $exportHandler)
    {
        $this->exportHandler = $exportHandler;
    }

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

    /**
     * @return EntityExportHandler
     */
    public function getExportHandler(): EntityExportHandler
    {
        return $this->exportHandler;
    }

    /**
     * @param EntityExportHandler $exportHandler
     * @return Sprint
     */
    public function setExportHandler(EntityExportHandler $exportHandler): Sprint
    {
        $this->exportHandler = $exportHandler;
        return $this;
    }

    /**
     * @return void
     */
    public function export(): void
    {
        $this->exportHandler->export($this);
    }

    /**
     * @return string|void
     */
    public function serialize(): ?string
    {
        // TODO: Implement serialize() method.
    }


    /**
     * @param string $serialized
     * @return \Serializable
     */
    public function unserialize($serialized): \Serializable
    {
        // TODO: Implement unserialize() method.
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Sprint
     */
    public function setId(string $id): Sprint
    {
        $this->id = $id;
        return $this;
    }
}
