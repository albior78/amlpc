<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class UserFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail("ebacour78@gmail.com");
        $this->addReference('USER_ADMIN', $user);
        $user->setPassword('$argon2id$v=19$m=65536,t=4,p=1$bjJ6Lk5ZOW1yYjZWL1BlMA$BFdl0QnG4s15jZIr1GIYycnKbwfL3qSzLJAxk34DsmY');

        // $product = new Product();
        $manager->persist($user);

        $manager->flush();
    }
}
