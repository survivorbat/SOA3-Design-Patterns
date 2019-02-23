<?php

namespace Tests\ApplicationServiceBundle\Entity\SprintObserver;

use ApplicationServiceBundle\Service\NotifyHandler\NotifyHandler;
use ApplicationServiceBundle\Service\SprintObserver\SprintSlackObserver;
use DomainBundle\Entity\Sprint;
use DomainBundle\Entity\SprintState\SprintStateNew;
use PHPUnit\Framework\TestCase;

class SprintSlackObserverTest extends TestCase
{
    /**
     * @return void
     */
    public function testIfUpdateIsHandledCorrectly(): void
    {
        $sprintStateCurrent = $this->createMock(SprintStateNew::class);
        $sprintStateCurrent->method('getStateTitle')
            ->willReturn('New');
        $sprintStatePrev = $this->createMock(SprintStateNew::class);
        $sprintStatePrev->method('getStateTitle')
            ->willReturn('Closed');
        $sprint = $this->createMock(Sprint::class);
        $sprint->method('getCurrentState')
            ->willReturn($sprintStateCurrent);
        $sprint->method('getPrevState')
            ->willReturn($sprintStatePrev);
        $notifyHandler = $this->getMockBuilder(NotifyHandler::class)
            ->setMethods(['sendMessage', 'composeMessageContent', 'deliverMessage'])
            ->getMock();
        $notifyHandler->expects($this->once())
            ->method('sendMessage');
        $sprintObserver = new SprintSlackObserver($notifyHandler);
        $sprintObserver->update($sprint);
    }

    /**
     * @return void
     */
    public function testIfSendMessageNotCalledWhenStateIsWrong(): void
    {
        $sprintStateCurrent = $this->createMock(SprintStateNew::class);
        $sprintStateCurrent->method('getStateTitle')
            ->willReturn('New');
        $sprintStatePrev = $this->createMock(SprintStateNew::class);
        $sprintStatePrev->method('getStateTitle')
            ->willReturn('New');
        $sprint = $this->createMock(Sprint::class);
        $sprint->method('getCurrentState')
            ->willReturn($sprintStateCurrent);
        $sprint->method('getPrevState')
            ->willReturn($sprintStatePrev);
        $notifyHandler = $this->getMockBuilder(NotifyHandler::class)
            ->setMethods(['sendMessage', 'composeMessageContent', 'deliverMessage'])
            ->getMock();
        $notifyHandler->expects($this->never())
            ->method('sendMessage');
        $sprintObserver = new SprintSlackObserver($notifyHandler);
        $sprintObserver->update($sprint);
    }
}
