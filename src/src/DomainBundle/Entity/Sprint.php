<?php

namespace DomainBundle\Entity;

use DomainBundle\Entity\SprintState\SprintState;
use phpDocumentor\Reflection\Types\Integer;
use SplObserver;
use SplSubject;

class Sprint implements SplSubject, Exportable
{
    /** @var string $id */
    private $id = '';
    /** @var string $name */
    private $name;
    /** @var SplObserver[]|array $sprintObservers */
    private $sprintObservers = [];
    /** @var EntityExportHandlerInterface $exportHandler */
    private $exportHandler;
    /** @var SprintState $currentState */
    private $currentState;
    /** @var SprintState $prevState */
    private $prevState;
    /** @var BacklogComponent[]|array $backlogComponents */
    private $backlogComponents = [];
    /** @var \DateTime $createdAt */
    private $createdAt;

    /**
     * Sprint constructor.
     * @param EntityExportHandlerInterface $exportHandler
     * @param SprintState $initialState
     */
    public function __construct(
        EntityExportHandlerInterface $exportHandler,
        SprintState $initialState
    ) {
        $this->exportHandler = $exportHandler;
        $this->setCurrentState($initialState);

        $this->createdAt = new \DateTime();
    }

    /**
     * @param SprintState $sprintState
     * @return Sprint
     */
    public function setCurrentState(SprintState $sprintState): Sprint
    {
        $this->prevState = $this->currentState;
        $this->currentState = $sprintState;
        return $this;
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

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Sprint
     */
    public function setName(string $name): Sprint
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     * @return Sprint
     */
    public function setCreatedAt(\DateTime $createdAt): Sprint
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return SprintState
     */
    public function getCurrentState(): SprintState
    {
        return $this->currentState;
    }

    /**
     * @return SprintState
     */
    public function getPrevState(): ?SprintState
    {
        return $this->prevState;
    }
}
