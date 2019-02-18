<?php

namespace DomainBundle\Entity\Forum;

use DomainBundle\Entity\User;

class ForumTopic
{
    /** @var string $title */
    private $title = "";
    /** @var string $content */
    private $content = "";
    /** @var User|null $author */
    private $author;
    /** @var ForumComment[]|array $comments */
    private $comments = [];

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return ForumTopic
     */
    public function setTitle(string $title): ForumTopic
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return ForumTopic
     */
    public function setContent(string $content): ForumTopic
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return array|ForumComment[]
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param array|ForumComment[] $comments
     * @return ForumTopic
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
        return $this;
    }

    /**
     * @return User|null
     */
    public function getAuthor(): ?User
    {
        return $this->author;
    }

    /**
     * @param User|null $author
     * @return ForumTopic
     */
    public function setAuthor(?User $author): ForumTopic
    {
        $this->author = $author;
        return $this;
    }
}
