<?php
namespace Tests;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use App\User;

#[CoversClass(User::class)]
class UserTest extends TestCase
{
  #[Test]
  public function testUserCanBeCreated(): void
    {
        $user = new User('John', 30);

        $this->assertSame('John', $user->getName());
        $this->assertSame(30, $user->getAge());
    }

  #[Test]
    public function testSettersWork(): void
    {
        $user = new User('Jane', 25);
        $user->setName('Alice');
        $user->setAge(35);

        $this->assertSame('Alice', $user->getName());
        $this->assertSame(35, $user->getAge());
    }
}
