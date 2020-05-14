<?php

declare(strict_types=1);

namespace Answear\PocztaPolskaBundle\Enum;

use MabeEnum\Enum;
use MabeEnum\EnumSerializableTrait;

class PickupPointTypeEnum extends Enum implements \Serializable
{
    use EnumSerializableTrait;

    public const POCZTA = 'POCZTA';
    public const ORLEN = 'ORLEN';
    public const AUTOMAT_POCZTOWY = 'AUTOMAT POCZTOWY';
    public const RUCH = 'RUCH';
    public const ZABKA = 'ZABKA';
    public const FRESHMARKET = 'FRESHMARKET';
    public const AUTOMAT_BIEDRONKA = 'AUTOMAT BIEDRONKA';
    public const AUTOMAT_CARREFOUR = 'AUTOMAT CARREFOUR';
    public const AUTOMAT_PLACOWKA = 'AUTOMAT PLACOWKA';
    public const AUTOMAT_SPOLEM = 'AUTOMAT SPOLEM';
    public const AUTOMAT_LEWIATAN = 'AUTOMAT LEWIATAN';

    public static function poczta(): self
    {
        return static::get(static::POCZTA);
    }

    public static function orlen(): self
    {
        return static::get(static::ORLEN);
    }

    public static function automatPocztowy(): self
    {
        return static::get(static::AUTOMAT_POCZTOWY);
    }

    public static function ruch(): self
    {
        return static::get(static::RUCH);
    }

    public static function zabka(): self
    {
        return static::get(static::ZABKA);
    }

    public static function freshmarket(): self
    {
        return static::get(static::FRESHMARKET);
    }

    public static function automatBiedronka(): self
    {
        return static::get(static::AUTOMAT_BIEDRONKA);
    }

    public static function automatCarrefour(): self
    {
        return static::get(static::AUTOMAT_CARREFOUR);
    }

    public static function automatPlacowka(): self
    {
        return static::get(static::AUTOMAT_PLACOWKA);
    }

    public static function automatSpolem(): self
    {
        return static::get(static::AUTOMAT_SPOLEM);
    }

    public static function automatLewiatan(): self
    {
        return static::get(static::AUTOMAT_LEWIATAN);
    }
}
