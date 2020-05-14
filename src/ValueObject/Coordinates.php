<?php

declare(strict_types=1);

namespace Answear\PocztaPolskaBundle\ValueObject;

class Coordinates
{
    /**
     * @var float
     */
    private $y;

    /**
     * @var float
     */
    private $x;

    public function __construct(float $y, float $x)
    {
        $this->y = $y;
        $this->x = $x;
    }

    public function getY(): float
    {
        return $this->y;
    }

    public function getX(): float
    {
        return $this->x;
    }
}
