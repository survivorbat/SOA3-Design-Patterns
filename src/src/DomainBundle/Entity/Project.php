<?php

namespace DomainBundle\Entity;

class Project
{
    /** @var string|null $id */
    private $id;
    /** @var Sprint[]|array $sprints */
    private $sprints;
    /** @var BacklogComponent[]|array $backlogItems */
    private $backlogItems;
    /** @var User[]|array $users */
    private $users;
    /** @var Pipeline[]|array $pipelines */
    private $pipelines;

    /**
     * @return array|Sprint[]
     */
    public function getSprints(): array
    {
        return $this->sprints;
    }

    /**
     * @return null|string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param null|string $id
     * @return Project
     */
    public function setId(?string $id): Project
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param array|Sprint[] $sprints
     * @return Project
     */
    public function setSprints($sprints): Project
    {
        $this->sprints = $sprints;
        return $this;
    }

    /**
     * @return array|BacklogComponent[]
     */
    public function getBacklogComponents(): array
    {
        return $this->backlogItems;
    }

    /**
     * @param array|BacklogComponent[] $backlogItems
     * @return Project
     */
    public function setBacklogComponents($backlogItems): Project
    {
        $this->backlogItems = $backlogItems;
        return $this;
    }

    /**
     * @return array|User[]
     */
    public function getUsers(): array
    {
        return $this->users;
    }

    /**
     * @param array|User[] $users
     * @return Project
     */
    public function setUsers($users): Project
    {
        $this->users = $users;
        return $this;
    }

    /**
     * @return array|Pipeline[]
     */
    public function getPipelines(): array
    {
        return $this->pipelines;
    }

    /**
     * @param array|Pipeline[] $pipelines
     * @return Project
     */
    public function setPipelines($pipelines): Project
    {
        $this->pipelines = $pipelines;
        return $this;
    }
}
