<?php

namespace Tests\DomainBundle\Unit\Entity\SprintState;

use DomainBundle\Entity\Sprint;
use DomainBundle\Entity\SprintState\SprintStateActive;
use DomainBundle\Entity\SprintState\SprintStateCanceled;
use DomainBundle\Entity\SprintState\SprintStateClosed;
use DomainBundle\Entity\SprintState\SprintStateFinished;
use DomainBundle\Entity\SprintState\SprintStateNew;
use PHPUnit\Framework\TestCase;

class SprintStateClosedTest extends TestCase
{
    /**
     * @return void
     */
    public function testIfStateDescriptionIsAString(): void
    {
        $state = new SprintStateClosed();
        $this->assertIsString($state->getStateDescription());
    }

    /**
     * @return void
     */
    public function testIfStateTitleIsAString(): void
    {
        $state = new SprintStateClosed();
        $this->assertIsString($state->getStateTitle());
    }
}
