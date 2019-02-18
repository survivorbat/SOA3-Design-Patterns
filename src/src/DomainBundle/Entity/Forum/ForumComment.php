<?php

namespace DomainBundle\Entity\Forum;

use DomainBundle\Entity\User;

class ForumComment
{
    /** @var User|null $author */
    private $author;
    /** @var string $content */
    private $content = "";

    /**
     * @return User|null
     */
    public function getAuthor(): ?User
    {
        return $this->author;
    }

    /**
     * @param User|null $author
     * @return ForumComment
     */
    public function setAuthor(?User $author): ForumComment
    {
        $this->author = $author;
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
     * @return ForumComment
     */
    public function setContent(string $content): ForumComment
    {
        $this->content = $content;
        return $this;
    }
}
