<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Video;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class VideosFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $users = $manager->getRepository(User::class)->findAll();
        foreach ($users as $user) {
            for ($index = 1; $index <= 5; $index++) {
                $video = new Video();
                $video->setTitle($this->generateRandomString());
                $manager->persist($video);
                $user->addVideo($video);
            }
        }

        $manager->flush();
    }

    private function generateRandomString(): string
    {
        return substr(
            str_shuffle(
                str_repeat(
                    $x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
                    10
                )
            ),
            1,
            10
        );
    }
}
