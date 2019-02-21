<?php

namespace DomainBundle\Entity;

class BacklogItem extends BacklogComponent
{
    /** @var BacklogItem[]|array $subItems */
    private $subItems = [];

    /**
     * @inheritdoc
     */
    public function removeComponent(BacklogComponent $backlogComponent): BacklogComponent
    {
        $this->subItems = array_filter(
            $this->subItems,
            function (BacklogComponent $backlogItemInList) use ($backlogComponent) {
                return $backlogComponent !== $backlogItemInList;
            }
        );
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function addComponent(BacklogComponent $backlogComponent): BacklogComponent
    {
        $this->subItems[] = $backlogComponent;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getChild(int $index): ?BacklogComponent
    {
        return $this->subItems[$index] ?? null;
    }
}
