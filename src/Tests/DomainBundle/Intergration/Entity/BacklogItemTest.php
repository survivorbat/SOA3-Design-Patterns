<?php

namespace Tests\DomainBundle\Intergration\Entity;

use DomainBundle\Entity\BacklogItem;
use DomainBundle\Entity\BacklogItemState\BacklogComponentStateDoing;
use DomainBundle\Entity\BacklogItemState\BacklogComponentStateDone;
use DomainBundle\Entity\BacklogItemState\BacklogComponentStateTodo;
use DomainBundle\Entity\BacklogTask;
use PHPUnit\Framework\TestCase;

class BacklogItemTest extends TestCase
{
    /**
     * @return void
     */
    public function testIfBacklogItemCanBeFinishedIfSubItemsAreFinished(): void
    {
        $mainBacklogItem = new BacklogItem(new BacklogComponentStateTodo());

        $backlogTask = new BacklogTask(new BacklogComponentStateDone());
        $backlogTask2 = new BacklogTask(new BacklogComponentStateDone());
        $backlogTask3 = new BacklogTask(new BacklogComponentStateDone());

        $mainBacklogItem->addComponent($backlogTask)
            ->addComponent($backlogTask2)
            ->addComponent($backlogTask3);

        $this->assertTrue($mainBacklogItem->canBeFinished());
    }

    /**
     * @return void
     */
    public function testIfBacklogItemCanNotBeFinishedIfSubItemsAreNotFinished(): void
    {
        $mainBacklogItem = new BacklogItem(new BacklogComponentStateTodo());

        $backlogTask = new BacklogTask(new BacklogComponentStateDone());
        $backlogTask2 = new BacklogTask(new BacklogComponentStateDone());
        $backlogTask3 = new BacklogTask(new BacklogComponentStateTodo());

        $mainBacklogItem->addComponent($backlogTask)
            ->addComponent($backlogTask2)
            ->addComponent($backlogTask3);

        $this->assertFalse($mainBacklogItem->canBeFinished());
    }

    /**
     * @return void
     */
    public function testIfBacklogItemCanBeFinishedIfSubItemsAreFinishedButOnlyAfterFinishingIt(): void
    {
        $mainBacklogItem = new BacklogItem(new BacklogComponentStateTodo());

        $backlogTask = new BacklogTask(new BacklogComponentStateDone());
        $backlogTask2 = new BacklogTask(new BacklogComponentStateDone());
        $backlogTask3 = new BacklogTask(new BacklogComponentStateTodo());

        $mainBacklogItem->addComponent($backlogTask)
            ->addComponent($backlogTask2)
            ->addComponent($backlogTask3);

        $this->assertFalse($mainBacklogItem->canBeFinished());

        $backlogTask3->start();
        $backlogTask3->finish();

        $this->assertTrue($mainBacklogItem->canBeFinished());
    }

    /**
     * @return void
     */
    public function testIfBacklogItemCanBeFinishedIfSubItemsAreFinishedButOnlyAfterFinishingIt2(): void
    {
        $mainBacklogItem = new BacklogItem(new BacklogComponentStateTodo());

        $backlogTask = new BacklogTask(new BacklogComponentStateDone());
        $backlogTask2 = new BacklogTask(new BacklogComponentStateDoing());
        $backlogTask3 = new BacklogTask(new BacklogComponentStateTodo());

        $mainBacklogItem->addComponent($backlogTask)
            ->addComponent($backlogTask2)
            ->addComponent($backlogTask3);

        $mainBacklogItem->start();

        $this->assertFalse($mainBacklogItem->canBeFinished());

        $backlogTask3->start();
        $backlogTask3->finish();

        $this->assertFalse($mainBacklogItem->canBeFinished());
        $backlogTask2->finish();
        $this->assertTrue($mainBacklogItem->canBeFinished());
        $this->assertFalse($mainBacklogItem->isFinished());
        $mainBacklogItem->finish();
        $this->assertTrue($mainBacklogItem->isFinished());
    }

    /**
     * @return void
     */
    public function testIfRecursiveBacklogItemsAreFinishedWhenMethodsAreCalled(): void
    {
        $mainBacklogItem = new BacklogItem(new BacklogComponentStateTodo());

        $backlogTask = new BacklogTask(new BacklogComponentStateDone());
        $backlogTask2 = new BacklogTask(new BacklogComponentStateDoing());
        $backlogTask3 = new BacklogTask(new BacklogComponentStateTodo());
        $backlogItem4 = new BacklogItem(new BacklogComponentStateDoing());

        $nestedBacklogTask = new BacklogTask(new BacklogComponentStateTodo());
        $nestedBacklogTask2 = new BacklogTask(new BacklogComponentStateTodo());
        $nestedBacklogTask3 = new BacklogTask(new BacklogComponentStateTodo());

        $backlogItem4->addComponent($nestedBacklogTask)
            ->addComponent($nestedBacklogTask2)
            ->addComponent($nestedBacklogTask3);

        $mainBacklogItem->addComponent($backlogTask)
            ->addComponent($backlogTask2)
            ->addComponent($backlogTask3)
            ->addComponent($backlogItem4);

        $this->assertFalse($mainBacklogItem->canBeFinished());
        $backlogTask2->finish();
        $this->assertFalse($mainBacklogItem->canBeFinished());
        $backlogTask3->start();
        $backlogTask3->finish();
        $this->assertFalse($mainBacklogItem->canBeFinished());
        $this->assertFalse($backlogItem4->canBeFinished());
        $nestedBacklogTask->start();
        $nestedBacklogTask->finish();
        $this->assertFalse($mainBacklogItem->canBeFinished());
        $this->assertFalse($backlogItem4->canBeFinished());
        $nestedBacklogTask2->start();
        $nestedBacklogTask2->finish();
        $this->assertFalse($mainBacklogItem->canBeFinished());
        $this->assertFalse($backlogItem4->canBeFinished());
        $nestedBacklogTask3->start();
        $nestedBacklogTask3->finish();
        $this->assertFalse($mainBacklogItem->canBeFinished());
        $this->assertTrue($backlogItem4->canBeFinished());
        $backlogItem4->finish();
        $this->assertTrue($backlogItem4->isFinished());
        $this->assertFalse($mainBacklogItem->isFinished());
        $mainBacklogItem->start();
        $mainBacklogItem->finish();
        $this->assertTrue($mainBacklogItem->isFinished());
    }
}