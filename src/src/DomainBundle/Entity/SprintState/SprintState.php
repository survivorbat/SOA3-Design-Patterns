<?php

namespace DomainBundle\Entity\SprintState;

use DomainBundle\Entity\Sprint;

abstract class SprintState
{
    /**
     * @return bool
     */
    public function isEditable(): bool
    {
        return false;
    }

    /**
     * @param Sprint $sprint
     */
    public function finish(Sprint $sprint): void
    {
        throw new \BadMethodCallException('This state method has not been implemented.');
    }

    /**
     * @param Sprint $sprint
     */
    public function close(Sprint $sprint): void
    {
        throw new \BadMethodCallException('This state method has not been implemented.');
    }

    /**
     * @param Sprint $sprint
     */
    public function cancel(Sprint $sprint): void
    {
        throw new \BadMethodCallException('This state method has not been implemented.');
    }

    /**
     * @param Sprint $sprint
     */
    public function start(Sprint $sprint): void
    {
        throw new \BadMethodCallException('This state method has not been implemented.');
    }

    /**
     * @return string
     */
    abstract public function getStateTitle(): string;

    /**
     * @return string
     */
    abstract public function getStateDescription(): string;
}
