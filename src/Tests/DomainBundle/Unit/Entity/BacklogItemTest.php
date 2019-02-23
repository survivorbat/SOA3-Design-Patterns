<?php

namespace Tests\DomainBundle\Unit\Entity;

use DomainBundle\Entity\BacklogComponent;
use DomainBundle\Entity\BacklogItemState\BacklogComponentState;
use DomainBundle\Entity\User;
use PHPUnit\Framework\TestCase;
use DomainBundle\Entity\BacklogItem;

class BacklogItemTest extends TestCase
{
    /** @var BacklogComponentState $mockState */
    private $mockState;

    /**
     * Setup
     */
    public function setUp()
    {
        $this->mockState = $this->createMock(BacklogComponentState::class);
        $this->mockState->method('isFinished')
            ->willReturn(true);
    }

    public function testAddComponentAndGetChildWorks()
    {
        $backlogItem = new BacklogItem($this->mockState);
        $backlogComponent = $this->createMock(BacklogComponent::class);
        $backlogItem->addComponent($backlogComponent);
        $this->assertEquals($backlogComponent, $backlogItem->getChild(0));
    }

    public function testAnAddedComponentCanBeDeleted()
    {
        $backlogItem = new BacklogItem($this->mockState);
        $backlogComponent = $this->createMock(BacklogComponent::class);
        $backlogItem->addComponent($backlogComponent);
        $backlogItem->removeComponent($backlogComponent);
        $this->assertEquals(null, $backlogItem->getChild(0));
    }

    public function testAnUserCanBeAssignedForTheBacklogItem()
    {
        $backlogItem = new BacklogItem($this->mockState);
        $user = $this->createMock(User::class);
        $backlogItem->setAssignedUser($user);
        $this->assertEquals($user, $backlogItem->getAssignedUser());
    }

    public function testAnBacklogItemCantHaveMoreUsersAssignedToIt()
    {
        $backlogItem = new BacklogItem($this->mockState);
        $user1 = $this->createMock(User::class);
        $user2 = $this->createMock(User::class);
        $backlogItem->setAssignedUser($user1);
        $backlogItem->setAssignedUser($user2);
        $this->assertEquals($user2, $backlogItem->getAssignedUser());
    }

    /**
     * @return void
     */
    public function testCanBeFinishedReturnsTrueWithNoItems(): void
    {
        $backlogItem = new BacklogItem($this->mockState);

        $this->assertTrue($backlogItem->canBeFinished());
    }

    /**
     * @return void
     */
    public function testCanBeFinishedReturnsTrueWithOneFinishedItem(): void
    {
        $backlogSubItem = $this->createMock(BacklogItem::class);
        $backlogSubItem->expects($this->once())
            ->method('isFinished')
            ->willReturn(true);

        $backlogItem = new BacklogItem($this->mockState);
        $backlogItem->addComponent($backlogSubItem);

        $this->assertTrue($backlogItem->canBeFinished());
    }

    /**
     * @return void
     */
    public function testCanBeFinishedReturnsFalseWithOneFinishedItem(): void
    {
        $backlogSubItem = $this->createMock(BacklogItem::class);
        $backlogSubItem->expects($this->once())
            ->method('isFinished')
            ->willReturn(false);

        $backlogItem = new BacklogItem($this->mockState);
        $backlogItem->addComponent($backlogSubItem);

        $this->assertFalse($backlogItem->canBeFinished());
    }

    /**
     * @return void
     */
    public function testCanBeFinishedReturnsTrueWithMultipleItems(): void
    {
        $backlogSubItem = $this->createMock(BacklogItem::class);
        $backlogSubItem->expects($this->once())
            ->method('isFinished')
            ->willReturn(true);
        $backlogSubItem2 = $this->createMock(BacklogItem::class);
        $backlogSubItem2->expects($this->once())
            ->method('isFinished')
            ->willReturn(true);

        $backlogItem = new BacklogItem($this->mockState);
        $backlogItem->addComponent($backlogSubItem);
        $backlogItem->addComponent($backlogSubItem2);

        $this->assertTrue($backlogItem->canBeFinished());
    }

    /**
     * @return void
     */
    public function testCanBeFinishedReturnsFalseWithMultipleItemsAndShortCircuits(): void
    {
        $backlogSubItem = $this->createMock(BacklogItem::class);
        $backlogSubItem->expects($this->once())
            ->method('isFinished')
            ->willReturn(false);
        $backlogSubItem2 = $this->createMock(BacklogItem::class);

        $backlogItem = new BacklogItem($this->mockState);
        $backlogItem->addComponent($backlogSubItem);
        $backlogItem->addComponent($backlogSubItem2);

        $this->assertFalse($backlogItem->canBeFinished());
    }

    /**
     * @return void
     */
    public function testCanBeFinishedReturnsFalseWithMultipleMixedItemsAndShortCircuits(): void
    {
        $backlogSubItem = $this->createMock(BacklogItem::class);
        $backlogSubItem->expects($this->once())
            ->method('isFinished')
            ->willReturn(true);
        $backlogSubItem2 = $this->createMock(BacklogItem::class);
        $backlogSubItem2->expects($this->once())
            ->method('isFinished')
            ->willReturn(true);
        $backlogSubItem3 = $this->createMock(BacklogItem::class);
        $backlogSubItem3->expects($this->once())
            ->method('isFinished')
            ->willReturn(false);
        $backlogSubItem4 = $this->createMock(BacklogItem::class);

        $backlogItem = new BacklogItem($this->mockState);
        $backlogItem->addComponent($backlogSubItem);
        $backlogItem->addComponent($backlogSubItem2);
        $backlogItem->addComponent($backlogSubItem3);
        $backlogItem->addComponent($backlogSubItem4);

        $this->assertFalse($backlogItem->canBeFinished());
    }

    /**
     * @return void
     */
    public function testIfGetScoreIs0WithNoSubItems(): void
    {
        $backlogItem = new BacklogItem($this->mockState);
        $this->assertEquals(0, $backlogItem->getScore());
    }

    /**
     * @return void
     */
    public function testIfGetScoreIsCorrectWithOneSubItem(): void
    {
        $backlogSubItem = $this->createMock(BacklogItem::class);
        $backlogSubItem->expects($this->once())
            ->method('getScore')
            ->willReturn(10);

        $backlogItem = new BacklogItem($this->mockState);
        $backlogItem->addComponent($backlogSubItem);
        $this->assertEquals(10, $backlogItem->getScore());
    }

    /**
     * @return void
     */
    public function testIfGetScoreIsCorrectWithTwoSubItems(): void
    {
        $backlogSubItem = $this->createMock(BacklogItem::class);
        $backlogSubItem->expects($this->once())
            ->method('getScore')
            ->willReturn(15);

        $backlogSubItem2 = $this->createMock(BacklogItem::class);
        $backlogSubItem2->expects($this->once())
            ->method('getScore')
            ->willReturn(60);

        $backlogItem = new BacklogItem($this->mockState);
        $backlogItem->addComponent($backlogSubItem);
        $backlogItem->addComponent($backlogSubItem2);
        $this->assertEquals(75, $backlogItem->getScore());
    }

    /**
     * @return void
     */
    public function testIfGetScoreIsCorrectWithThreeSubItems(): void
    {
        $backlogSubItem = $this->createMock(BacklogItem::class);
        $backlogSubItem->expects($this->once())
            ->method('getScore')
            ->willReturn(15);

        $backlogSubItem2 = $this->createMock(BacklogItem::class);
        $backlogSubItem2->expects($this->once())
            ->method('getScore')
            ->willReturn(60);

        $backlogSubItem3 = $this->createMock(BacklogItem::class);
        $backlogSubItem3->expects($this->once())
            ->method('getScore')
            ->willReturn(156);

        $backlogItem = new BacklogItem($this->mockState);
        $backlogItem->addComponent($backlogSubItem);
        $backlogItem->addComponent($backlogSubItem2);
        $backlogItem->addComponent($backlogSubItem3);
        $this->assertEquals(231, $backlogItem->getScore());
    }
}
