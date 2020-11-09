<?php

namespace App\DataFixtures;

use App\Entity\Address;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserAddressFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $users = $manager->getRepository(User::class)->findAll();
        foreach ($users as $user) {
            $address = new Address();
            $address->setNumber(rand(1, PHP_INT_MAX));
            $address->setStreet('Calle Falsa');
            $manager->persist($address);
            $user->setAddress($address);
            $manager->persist($user);
        }

        $manager->flush();
    }
}
