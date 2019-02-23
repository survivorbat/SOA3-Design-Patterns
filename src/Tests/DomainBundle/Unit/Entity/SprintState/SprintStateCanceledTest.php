<?php

namespace Tests\DomainBundle\Unit\Entity\SprintState;

use DomainBundle\Entity\Sprint;
use DomainBundle\Entity\SprintState\SprintStateActive;
use DomainBundle\Entity\SprintState\SprintStateCanceled;
use DomainBundle\Entity\SprintState\SprintStateClosed;
use DomainBundle\Entity\SprintState\SprintStateFinished;
use DomainBundle\Entity\SprintState\SprintStateNew;
use PHPUnit\Framework\TestCase;

class SprintStateCanceledTest extends TestCase
{
    /**
     * @return void
     */
    public function testIfStateDescriptionIsAString(): void
    {
        $state = new SprintStateCanceled();
        $this->assertIsString($state->getStateDescription());
    }
}
