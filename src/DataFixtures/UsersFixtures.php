<?php
declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

final class UsersFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($index = 1; $index <= 5; $index++) {
            $user = new User();
            $user->setName('User ' . $index);
            $manager->persist($user);
        }
        $manager->flush();
    }
}