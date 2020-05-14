<?php

declare(strict_types=1);

namespace Answear\PocztaPolskaBundle\Tests\Functional\Factory;

use Answear\PocztaPolskaBundle\DTO\PickupPoint;
use Answear\PocztaPolskaBundle\Factory\PickupPointFactory;
use PHPUnit\Framework\TestCase;

class PickupPointFactoryTest extends TestCase
{
    /**
     * @test
     */
    public function createsArrayFrom(): void
    {
        $factory = $this->getFactory();

        $pickupPoints = $factory->createArrayFromXml(__DIR__ . '/../../DataFixtures/XML/pickupPoints.xml');

        $this->assertCount(3, $pickupPoints);
        $this->assertEquals($this->getExpectedPickupPoints(), $pickupPoints);
    }

    /**
     * @return PickupPoint[]
     */
    private function getExpectedPickupPoints(): array
    {
        $pickupPoints = [];

        $pickupPoints[] = new PickupPoint(
            '232385',
            '50.682199',
            '16.608786',
            'DOLNOŚLĄSKIE',
            'dzierżoniowski',
            'Bielawa',
            'UP Bielawa 1',
            '58-260',
            'Bielawa',
            'ul. Piastowska 16',
            '885 900 649, 74 833 44 47',
            'dni robocze: 08:00-18:00#soboty: 08:00-14:00#niedziele i święta: placówka nieczynna#Placówka dostosowana do potrzeb osób niepełnosprawnych.#',
            '',
            'POCZTA'
        );
        $pickupPoints[] = new PickupPoint(
            '556577',
            '50.695338',
            '16.631300',
            'DOLNOŚLĄSKIE',
            'dzierżoniowski',
            'Bielawa',
            'FUP Bielawa 1',
            '58-260',
            'Bielawa',
            'ul. Stefana Żeromskiego 21',
            '74 833 44 45 #jedn. nadrzędna: UP Bielawa 1#tel.: 885 900 649, 74 833 44 47',
            'dni robocze: Pon.: 09:00-16:00 Wt.: 09:00-16:00 Śr.: 09:00-16:00 Czw.: 09:00-16:00 Pt.: 13:00-20:00#soboty: placówka nieczynna#niedziele i święta: placówka nieczynna#Placówka dostosowana do potrzeb osób niepełnosprawnych.#',
            '',
            'POCZTA'
        );

        $pickupPoints[] = new PickupPoint(
            '232404',
            '50.683947',
            '16.622841',
            'DOLNOŚLĄSKIE',
            'dzierżoniowski',
            'Bielawa',
            'UP Bielawa 4',
            '58-263',
            'Bielawa',
            'ul. Jana III Sobieskiego 17',
            '74 833 44 40',
            'dni robocze: Pon.: 08:00-18:00 Wt.: 08:00-18:00 Śr.: 08:00-18:00 Czw.: 08:00-18:00 Pt.: 08:00-20:00#soboty: placówka nieczynna#niedziele i święta: placówka nieczynna#Placówka dostosowana do potrzeb osób niepełnosprawnych.#',
            '',
            'POCZTA'
        );

        return $pickupPoints;
    }

    private function getFactory(): PickupPointFactory
    {
        return new PickupPointFactory();
    }
}
