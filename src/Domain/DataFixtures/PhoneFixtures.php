<?php

namespace App\Domain\DataFixtures;

use App\Domain\Models\Memory;
use App\Domain\Models\Phone;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PhoneFixtures extends Fixture
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $memories = [
            '64' => new Memory(64),
            '128' => New Memory(128),
            '256' => New Memory(256),
            '512' => New Memory(512),
        ];

        foreach ($memories as $memory) {
            $manager->persist($memory);
        }

        $s9 = new Phone(
            'Samsung',
            'Android 8.0',
            4,
            3000,
            'nano',
            2960,
            1440,
            5.8,
            8,
            12,
            'Galaxy S9',
            true,
            false,
            true,
            false,
            69,
            148,
            163,
            9
        );
        $s9->getMemories()->add($memories['64']);
        $s9->getMemories()->add($memories['128']);
        $s9->getMemories()->add($memories['256']);

        $manager->persist($s9);

        $note9 = new Phone(
            'Samsung',
            'Android 8.1',
            6,
            4000,
            'nano',
            2960,
            1440,
            6.4,
            8,
            12,
            'Galaxy Note9',
            true,
            false,
            true,
            false,
            76,
            162,
            200,
            9
        );
        $note9->getMemories()->add($memories['128']);
        $note9->getMemories()->add($memories['512']);

        $manager->persist($note9);

        $p20 = new Phone(
            'Huawei',
            'Android 8.1',
            6,
            4000,
            'nano',
            2240,
            1080,
            6.1,
            24,
            20,
            'P20 Pro',
            true,
            false,
            true,
            false,
            74,
            155,
            180,
            8
        );
        $p20->getMemories()->add($memories['128']);

        $manager->persist($p20);

        $IPX = new Phone(
            'Apple',
            'iOS 11',
            3,
            2900,
            'nano',
            2436,
            1125,
            5.8,
            7,
            12,
            'iPhone X',
            true,
            false,
            true,
            false,
            71,
            144,
            174,
            8
        );
        $IPX->getMemories()->add($memories['64']);
        $IPX->getMemories()->add($memories['256']);

        $manager->persist($IPX);

        $IP8 = new Phone(
            'Apple',
            'iOS 11',
            2,
            1960,
            'nano',
            1334,
            750,
            4.7,
            7,
            12,
            'iPhone 8',
            true,
            false,
            true,
            false,
            67,
            138,
            148,
            7
        );
        $IP8->getMemories()->add($memories['64']);
        $IP8->getMemories()->add($memories['256']);

        $manager->persist($IP8);
        $manager->flush();
    }
}