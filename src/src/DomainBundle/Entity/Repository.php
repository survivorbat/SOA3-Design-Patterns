<?php

namespace DomainBundle\Entity;

use http\Exception\BadMethodCallException;

class Repository
{
    /** @var string $id */
    private $id;
    /** @var string $title */
    private $title = "";
    /** @var string $description */
    private $description = "";
    /** @var string $websiteUrl */
    private $websiteUrl = "";
    /** @var string $type */
    private $type;
    /** @var array $files */
    private $files = [];

    /**
     * @return string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Repository
     */
    public function setId(?string $id): Repository
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Repository
     */
    public function setType(string $type): Repository
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @param string $pathName
     */
    public function getFile(string $pathName)
    {
        throw new BadMethodCallException('Method not implemented');
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
     * @return Repository
     */
    public function setTitle(string $title): Repository
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
     * @return Repository
     */
    public function setDescription(string $description): Repository
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getWebsiteUrl(): string
    {
        return $this->websiteUrl;
    }

    /**
     * @param string $websiteUrl
     * @return Repository
     */
    public function setWebsiteUrl(string $websiteUrl): Repository
    {
        $this->websiteUrl = $websiteUrl;
        return $this;
    }

    /**
     * @return array
     */
    public function getFiles(): array
    {
        return $this->files;
    }

    /**
     * @param array $files
     * @return Repository
     */
    public function setFiles(array $files): Repository
    {
        $this->files = $files;
        return $this;
    }
}
