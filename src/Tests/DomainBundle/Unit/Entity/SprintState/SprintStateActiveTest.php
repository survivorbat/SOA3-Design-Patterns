<?php

namespace Tests\DomainBundle\Unit\Entity\SprintState;

use DomainBundle\Entity\Sprint;
use DomainBundle\Entity\SprintState\SprintStateActive;
use DomainBundle\Entity\SprintState\SprintStateCanceled;
use DomainBundle\Entity\SprintState\SprintStateClosed;
use DomainBundle\Entity\SprintState\SprintStateFinished;
use DomainBundle\Entity\SprintState\SprintStateNew;
use PHPUnit\Framework\TestCase;

class SprintStateActiveTest extends TestCase
{
    /**
     * @return void
     */
    public function testIfCloseChangesState(): void
    {
        $sprint = $this->createMock(Sprint::class);

        $sprint->expects($this->once())
            ->method('setCurrentState')
            ->with(new SprintStateFinished());

        $state = new SprintStateActive();

        $state->finish($sprint);
    }

    /**
     * @return void
     */
    public function testIfCancelChangesState(): void
    {
        $sprint = $this->createMock(Sprint::class);

        $sprint->expects($this->once())
            ->method('setCurrentState')
            ->with(new SprintStateCanceled());

        $state = new SprintStateActive();

        $state->cancel($sprint);
    }

    /**
     * @return void
     */
    public function testIfStateDescriptionIsAString(): void
    {
        $state = new SprintStateActive();
        $this->assertIsString($state->getStateDescription());
    }
}
