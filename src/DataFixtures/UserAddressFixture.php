<?php

namespace App\DataFixtures;

use App\Entity\Address;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserAddressFixture extends Fixture
{
    private const MAX_NUMBER = 999;

    public function load(ObjectManager $manager)
    {
        $users = $manager->getRepository(User::class)->findAll();
        foreach ($users as $user) {
            $address = new Address();
            $address->setNumber(rand(1, self::MAX_NUMBER));
            $address->setStreet('Calle Falsa');
            $manager->persist($address);
            $user->setAddress($address);
            $manager->persist($user);
        }

        $manager->flush();
    }
}
