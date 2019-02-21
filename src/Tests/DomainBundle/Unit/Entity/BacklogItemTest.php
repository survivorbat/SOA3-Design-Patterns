<?php

namespace Tests\DomainBundle\Unit;

use DomainBundle\Entity\BacklogComponent;
use DomainBundle\Entity\User;
use PHPUnit\Framework\TestCase;
use DomainBundle\Entity\BacklogItem;

class BacklogItemTest extends TestCase
{
    public function testAddComponentAndGetChildWorks()
    {
        $backlogItem = new BacklogItem();
        $backlogComponent = $this->createMock(BacklogComponent::class);
        $backlogItem->addComponent($backlogComponent);
        $this->assertEquals($backlogComponent, $backlogItem->getChild(0));
    }

    public function testAnAddedComponentCanBeDeleted()
    {
        $backlogItem = new BacklogItem();
        $backlogComponent = $this->createMock(BacklogComponent::class);
        $backlogItem->addComponent($backlogComponent);
        $backlogItem->removeComponent($backlogComponent);
        $this->assertEquals(null, $backlogItem->getChild(0));
    }

    public function testAnUserCanBeAssignedForTheBacklogItem()
    {
        $backlogItem = new BacklogItem();
        $user = $this->createMock(User::class);
        $backlogItem->setAssignedUser($user);
        $this->assertEquals($user, $backlogItem->getAssignedUser());
    }

    public function testAnBacklogItemCantHaveMoreUsersAssignedToIt()
    {
        $backlogItem = new BacklogItem();
        $user1 = $this->createMock(User::class);
        $user2 = $this->createMock(User::class);
        $backlogItem->setAssignedUser($user1);
        $backlogItem->setAssignedUser($user2);
        $this->assertEquals($user2, $backlogItem->getAssignedUser());
    }
}
