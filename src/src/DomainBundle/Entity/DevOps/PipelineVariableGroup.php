<?php

namespace DomainBundle\Entity\DevOps;

class PipelineVariableGroup
{
    /** @var string|null $id */
    private $id;
    /** @var string $name */
    private $name = "";
    /** @var PipelineVariable[]|array $variables */
    private $variables = [];

    /**
     * @return null|string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param null|string $id
     * @return PipelineVariableGroup
     */
    public function setId(?string $id): PipelineVariableGroup
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
     * @return PipelineVariableGroup
     */
    public function setName(string $name): PipelineVariableGroup
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return array|PipelineVariable[]
     */
    public function getVariables()
    {
        return $this->variables;
    }

    /**
     * @param array|PipelineVariable[] $variables
     * @return PipelineVariableGroup
     */
    public function setVariables($variables)
    {
        $this->variables = $variables;
        return $this;
    }
}
