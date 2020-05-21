<?php

declare(strict_types=1);

namespace Answear\PocztaPolskaBundle\DTO;

use Answear\PocztaPolskaBundle\ValueObject\Coordinates;

class PickupPoint
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var Coordinates
     */
    public $coordinates;

    /**
     * @var string
     */
    public $voivodeship;

    /**
     * @var string
     */
    public $poviat;

    /**
     * @var string
     */
    public $commune;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $postcode;

    /**
     * @var string
     */
    public $locality;

    /**
     * @var string
     */
    public $street;

    /**
     * @var string
     */
    public $phoneNumber;

    /**
     * @var string
     */
    public $description;

    /**
     * @var string
     */
    public $status;

    /**
     * @var string
     */
    public $type;

    public function __construct(
        string $id,
        Coordinates $coordinates,
        string $voivodeship,
        string $poviat,
        string $commune,
        string $name,
        string $postcode,
        string $locality,
        string $street,
        string $phoneNumber,
        string $description,
        string $status,
        string $type
    ) {
        $this->id = $id;
        $this->coordinates = $coordinates;
        $this->voivodeship = $voivodeship;
        $this->poviat = $poviat;
        $this->commune = $commune;
        $this->name = $name;
        $this->postcode = $postcode;
        $this->locality = $locality;
        $this->street = $street;
        $this->phoneNumber = $phoneNumber;
        $this->description = $description;
        $this->status = $status;
        $this->type = $type;
    }
}
