<?php

namespace DomainBundle\Entity\DevOps;

use DomainBundle\Entity\SCM\Repository;

class Pipeline
{
    /** @var string|null $id */
    private $id;
    /** @var string $title */
    private $title;
    /** @var Repository $repository */
    private $repository;

    /**
     * @return null|string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param null|string $id
     * @return Pipeline
     */
    public function setId(?string $id): Pipeline
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
     * @return Pipeline
     */
    public function setTitle(string $title): Pipeline
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return Repository
     */
    public function getRepository(): Repository
    {
        return $this->repository;
    }

    /**
     * @param Repository $repository
     * @return Pipeline
     */
    public function setRepository(Repository $repository): Pipeline
    {
        $this->repository = $repository;
        return $this;
    }
}
