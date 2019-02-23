<?php

namespace DomainBundle\Entity;

use DomainBundle\Entity\DevOps\Pipeline;
use DomainBundle\Entity\Forum\ForumTopic;
use DomainBundle\Entity\SCM\Repository;

class Project implements Exportable
{
    /** @var string|null $id */
    private $id = '';
    /** @var string $title */
    private $title = '';
    /** @var string $description */
    private $description = '';
    /** @var EntityExportHandlerInterface|null $exportHandler */
    private $exportHandler;
    /** @var Sprint[]|array $sprints */
    private $sprints = [];
    /** @var BacklogComponent[]|array $backlogItems */
    private $backlogItems = [];
    /** @var User[]|array $users */
    private $users = [];
    /** @var Pipeline[]|array $pipelines */
    private $pipelines = [];
    /** @var Repository[]|array $repositories */
    private $repositories = [];
    /** @var ForumTopic[]|array $forumTopics */
    private $forumTopics = [];
    /** @var \DateTime $createdAt */
    private $createdAt;

    /**
     * Project constructor.
     * @param EntityExportHandlerInterface $exportHandler
     */
    public function __construct(EntityExportHandlerInterface $exportHandler = null)
    {
        $this->exportHandler = $exportHandler;
        $this->createdAt = new \DateTime();
    }

    /**
     * @return EntityExportHandlerInterface|null
     */
    public function getExportHandler(): ?EntityExportHandlerInterface
    {
        return $this->exportHandler;
    }

    /**
     * @param EntityExportHandlerInterface $exportHandler
     * @return Project
     */
    public function setExportHandler(EntityExportHandlerInterface $exportHandler): Project
    {
        $this->exportHandler = $exportHandler;
        return $this;
    }

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
    public function setSprints(array $sprints): Project
    {
        $this->sprints = $sprints;
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
    public function setUsers(array $users): Project
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
    public function setPipelines(array $pipelines): Project
    {
        $this->pipelines = $pipelines;
        return $this;
    }

    /**
     * @return array|Repository[]
     */
    public function getRepositories(): array
    {
        return $this->repositories;
    }

    /**
     * @param array|Repository[] $repositories
     * @return Project
     */
    public function setRepositories(array $repositories): Project
    {
        $this->repositories = $repositories;
        return $this;
    }

    /**
     * @return array|BacklogComponent[]
     */
    public function getBacklogItems()
    {
        return $this->backlogItems;
    }

    /**
     * @param array|BacklogComponent[] $backlogItems
     * @return Project
     */
    public function setBacklogItems(array $backlogItems)
    {
        $this->backlogItems = $backlogItems;
        return $this;
    }

    /**
     * @return array|ForumTopic[]
     */
    public function getForumTopics()
    {
        return $this->forumTopics;
    }

    /**
     * @param array|ForumTopic[] $forumTopics
     * @return Project
     */
    public function setForumTopics(array $forumTopics)
    {
        $this->forumTopics = $forumTopics;
        return $this;
    }

    /**
     * Export
     */
    public function export(): void
    {
        $this->exportHandler->export($this);
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
     * @return Project
     */
    public function setTitle(string $title): Project
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
     * @return Project
     */
    public function setDescription(string $description): Project
    {
        $this->description = $description;
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
     * @return Project
     */
    public function setCreatedAt(\DateTime $createdAt): Project
    {
        $this->createdAt = $createdAt;
        return $this;
    }
}
