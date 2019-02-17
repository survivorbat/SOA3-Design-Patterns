<?php

namespace DomainBundle\Entity;

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testIdSet(): void
    {
        $user = new User();
        $user->setId('0');
        $this->assertEquals("0", $user->getId());
    }
    public function testUserNameSet(): void
    {
        $user = new User();
        $user->setUserName('0');
        $this->assertEquals("0", $user->getUserName());
    }
    public function testFirstNameSet(): void
    {
        $user = new User();
        $user->setFirstName('0');
        $this->assertEquals("0", $user->getFirstName());
    }
    public function testLastNameSet(): void
    {
        $user = new User();
        $user->setLastName('0');
        $this->assertEquals("0", $user->getLastName());
    }
    public function testEmailSet(): void
    {
        $user = new User();
        $user->setEmailAddress('0');
        $this->assertEquals("0", $user->getEmailAddress());
    }
    public function testPhoneSet(): void
    {
        $user = new User();
        $user->setPhoneNumber('0');
        $this->assertEquals("0", $user->getPhoneNumber());
    }
}
