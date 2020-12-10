<?php

declare(strict_types=1);

namespace Answear\PocztaPolskaBundle\Factory;

use Answear\PocztaPolskaBundle\DTO\PickupPoint;
use Answear\PocztaPolskaBundle\Enum\PickupPointTypeEnum;
use Answear\PocztaPolskaBundle\ValueObject\Coordinates;
use Webmozart\Assert\Assert;

class PickupPointFactory
{
    private const ID = 'pni';
    private const COORDINATE_Y = 'y';
    private const COORDINATE_X = 'x';
    private const VOIVODESHIP = 'wojewodztwo';
    private const POVIAT = 'powiat';
    private const COMMUNE = 'gmina';
    private const NAME = 'nazwa';
    private const POSTCODE = 'kod';
    private const LOCALITY = 'miejscowosc';
    private const STREET = 'ulica';
    private const PHONE_NUMBER = 'telefon';
    private const DESCRIPTION = 'opis';
    private const STATUS = 'stan';
    private const TYPE = 'typ';

    /**
     * @return PickupPoint[]
     */
    public function createArrayFromXml(string $xmlPath): array
    {
        $pickupPoints = [];

        $xml = simplexml_load_string(file_get_contents($xmlPath));

        if (!isset($xml->r)) {
            throw new \InvalidArgumentException('Invalid format of Poczta Polska Pickup Points file.');
        }

        foreach ($xml->r as $pickupPoint) {
            $pickupPoints[] = $this->create($pickupPoint);
        }

        return $pickupPoints;
    }

    private function create(\SimpleXMLElement $pickupPointXml): PickupPoint
    {
        $pickupPoint = \iterator_to_array($pickupPointXml->attributes());

        Assert::keyExists($pickupPoint, self::ID);
        Assert::keyExists($pickupPoint, self::COORDINATE_Y);
        Assert::keyExists($pickupPoint, self::COORDINATE_X);
        Assert::keyExists($pickupPoint, self::VOIVODESHIP);
        Assert::keyExists($pickupPoint, self::POVIAT);
        Assert::keyExists($pickupPoint, self::COMMUNE);
        Assert::keyExists($pickupPoint, self::NAME);
        Assert::keyExists($pickupPoint, self::POSTCODE);
        Assert::keyExists($pickupPoint, self::LOCALITY);
        Assert::keyExists($pickupPoint, self::STREET);
        Assert::keyExists($pickupPoint, self::PHONE_NUMBER);
        Assert::keyExists($pickupPoint, self::DESCRIPTION);
        Assert::keyExists($pickupPoint, self::STATUS);
        Assert::keyExists($pickupPoint, self::TYPE);

        Assert::oneOf((string) $pickupPoint[self::TYPE], PickupPointTypeEnum::getValues());

        return new PickupPoint(
            (string) $pickupPoint[self::ID],
            new Coordinates((float) $pickupPoint[self::COORDINATE_Y], (float) $pickupPoint[self::COORDINATE_X]),
            (string) $pickupPoint[self::VOIVODESHIP],
            (string) $pickupPoint[self::POVIAT],
            (string) $pickupPoint[self::COMMUNE],
            (string) $pickupPoint[self::NAME],
            (string) $pickupPoint[self::POSTCODE],
            (string) $pickupPoint[self::LOCALITY],
            (string) $pickupPoint[self::STREET],
            (string) $pickupPoint[self::PHONE_NUMBER],
            (string) $pickupPoint[self::DESCRIPTION],
            (string) $pickupPoint[self::STATUS],
            (string) $pickupPoint[self::TYPE]
        );
    }
}
