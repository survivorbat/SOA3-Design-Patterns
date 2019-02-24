<?php

namespace Tests\DomainBundle\Unit\Entity\SprintState;

use DomainBundle\Entity\Sprint;
use DomainBundle\Entity\SprintState\SprintStateActive;
use DomainBundle\Entity\SprintState\SprintStateNew;
use PHPUnit\Framework\TestCase;

class SprintStateNewTest extends TestCase
{
    /**
     * @return void
     */
    public function testIfStartChangesState(): void
    {
        $sprint = $this->createMock(Sprint::class);

        $sprint->expects($this->once())
            ->method('setCurrentState')
            ->with(new SprintStateActive());

        $state = new SprintStateNew();

        $state->start($sprint);
    }

    /**
     * @return void
     */
    public function testIfIsNotEditable(): void
    {
        $state = new SprintStateNew();
        $this->assertTrue($state->isEditable());
    }

    /**
     * @return void
     */
    public function testIfStateDescriptionIsAString(): void
    {
        $state = new SprintStateNew();
        $this->assertIsString($state->getStateDescription());
    }

    /**
     * @return void
     */
    public function testIfStateTitleIsAString(): void
    {
        $state = new SprintStateNew();
        $this->assertIsString($state->getStateTitle());
    }
}
