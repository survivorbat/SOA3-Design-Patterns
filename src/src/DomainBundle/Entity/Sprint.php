<?php

namespace DomainBundle\Entity;

use DomainBundle\Entity\SprintState\SprintState;
use phpDocumentor\Reflection\Types\Integer;
use SplObserver;
use SplSubject;

class Sprint implements SplSubject, \Serializable
{
    /** @var string $id */
    private $id;
    /** @var SplObserver[]|array $sprintObservers */
    private $sprintObservers = [];
    /** @var EntityExportHandlerInterface $exportHandler */
    private $exportHandler;
    /** @var SprintState $currentState */
    private $currentState;
    /** @var BacklogComponent[]|array $backlogComponents */
    private $backlogComponents = [];

    /**
     * Sprint constructor.
     * @param EntityExportHandlerInterface $exportHandler
     */
    public function __construct(EntityExportHandlerInterface $exportHandler)
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
     * @return EntityExportHandlerInterface
     */
    public function getExportHandler(): EntityExportHandlerInterface
    {
        return $this->exportHandler;
    }

    /**
     * @param EntityExportHandlerInterface $exportHandler
     * @return Sprint
     */
    public function setExportHandler(EntityExportHandlerInterface $exportHandler): Sprint
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

    /**
     * @param BacklogComponent $backlogComponent
     */
    public function addBacklogComponent(BacklogComponent $backlogComponent): void
    {
        $this->backlogComponents[] = $backlogComponent;
    }

    /**
     * @return int
     */
    public function backlogItemsToDo(): int
    {
        return count($this->backlogComponents);
    }
}
