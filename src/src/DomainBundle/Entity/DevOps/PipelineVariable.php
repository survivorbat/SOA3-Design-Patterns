<?php

namespace DomainBundle\Entity\DevOps;

class PipelineVariable
{
    /** @var string|null $id */
    private $id;
    /** @var string $name */
    private $name = "";
    /** @var string $value */
    private $value = "";
    /** @var bool $isSecret */
    private $isSecret = false;

    /**
     * @return null|string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param null|string $id
     * @return PipelineVariable
     */
    public function setId(?string $id): PipelineVariable
    {
        $this->id = $id;
        return $this;
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
     * @return PipelineVariable
     */
    public function setName(string $name): PipelineVariable
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return PipelineVariable
     */
    public function setValue(string $value): PipelineVariable
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return bool
     */
    public function isSecret(): bool
    {
        return $this->isSecret;
    }

    /**
     * @param bool $isSecret
     * @return PipelineVariable
     */
    public function setIsSecret(bool $isSecret): PipelineVariable
    {
        $this->isSecret = $isSecret;
        return $this;
    }
}
