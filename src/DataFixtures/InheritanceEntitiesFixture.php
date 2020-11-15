<?php

namespace App\DataFixtures;

use App\Entity\Author;
use App\Entity\Pdf;
use App\Entity\Video;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class InheritanceEntitiesFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 2; $i++) {
            $author = new Author();
            $author->setName("Author #$i");
            $manager->persist($author);

            for ($j = 0; $j < 3; $j++) {
                $pdf = new Pdf();
                $pdf->setAuthor($author);
                $pdf->setDescription("pdf #$j description");
                $pdf->setFilename("pdf_#$j");
                $pdf->setPagesNumber(27);
                $pdf->setOrientation("portrait");
                $pdf->setSize(42);
                $manager->persist($pdf);

                $video = new Video();
                $video->setAuthor($author);
                $video->setDescription("video #$j description");
                $video->setFilename("video_#$j");
                $video->setDuration(27);
                $video->setTitle("portraitor");
                $video->setSize(42);
                $video->setFormat('mp4');
                $manager->persist($video);
            }
        }

        $manager->flush();
    }
}
