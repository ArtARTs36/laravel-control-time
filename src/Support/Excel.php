<?php

namespace ArtARTs36\ControlTime\Support;

class Excel
{
    public static function intToDateString(int $value): string
    {
        return date('Y-m-d', static::intToUnixTime($value));
    }

    public static function intToUnixTime(int $value): int
    {
        return ($value - 25569) * 86400;
    }
}
