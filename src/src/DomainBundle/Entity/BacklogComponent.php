<?php

namespace DomainBundle\Entity;

use DomainBundle\Entity\BacklogItemState\BacklogComponentState;
use http\Exception\BadMethodCallException;

abstract class BacklogComponent
{
    /** @var string|null $id */
    private $id;
    /** @var string $title */
    private $title;
    /** @var string $priority */
    private $priority;
    /** @var string $description */
    private $description;
    /** @var BacklogComponentState $currentState */
    private $currentState;
    /** @var ?User $assignedUser */
    private $assignedUser;

    /**
     * @return null|string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param null|string $id
     * @return BacklogComponent
     */
    public function setId(?string $id): BacklogComponent
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return BacklogComponent
     */
    public function setTitle(string $title): BacklogComponent
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return BacklogComponent
     */
    public function setDescription(string $description): BacklogComponent
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return BacklogComponentState
     */
    public function getCurrentState(): BacklogComponentState
    {
        return $this->currentState;
    }

    /**
     * @param BacklogComponentState $currentState
     * @return BacklogComponent
     */
    public function setCurrentState(BacklogComponentState $currentState): BacklogComponent
    {
        $this->currentState = $currentState;
        return $this;
    }

    /**
     * @return User|null
     */
    public function getAssignedUser(): ?User
    {
        return $this->assignedUser;
    }

    /**
     * @param User|null $assignedUser
     * @return BacklogComponent
     */
    public function setAssignedUser(?User $assignedUser)
    {
        $this->assignedUser = $assignedUser;
        return $this;
    }

    /**
     * @return string
     */
    public function getPriority(): ?string
    {
        return $this->priority;
    }

    /**
     * @param string $priority
     * @return BacklogComponent
     */
    public function setPriority(?string $priority): BacklogComponent
    {
        $this->priority = $priority;
        return $this;
    }

    /**
     * @return void
     */
    public function start(): void
    {
        $this->currentState->start($this);
    }

    /**
     * @return void
     */
    public function finish(): void
    {
        $this->currentState->finish($this);
    }

    /**
     * @return void
     */
    public function cancel(): void
    {
        $this->currentState->cancel($this);
    }

    /**
     * @param BacklogComponent $backlogComponent
     * @return BacklogComponent
     */
    public function addComponent(BacklogComponent $backlogComponent): BacklogComponent
    {
        throw new BadMethodCallException('Method not implemented');
    }

    /**
     * @param BacklogComponent $backlogComponent
     * @return BacklogComponent
     */
    public function removeComponent(BacklogComponent $backlogComponent): BacklogComponent
    {
        throw new BadMethodCallException('Method not implemented');
    }

    /**
     * @param int $index
     * @return BacklogComponent|null
     */
    public function getChild(int $index): ?BacklogComponent
    {
        throw new BadMethodCallException('Method not implemented');
    }

    /**
     * @return array|null
     */
    public function getChildren(): ?array
    {
        return null;
    }

    /**
     * @return bool
     */
    public function canBeFinished(): bool
    {
        return $this->getCurrentState()->canBeFinished($this);
    }

    /**
     * @return bool
     */
    abstract public function isFinished(): bool;
}
