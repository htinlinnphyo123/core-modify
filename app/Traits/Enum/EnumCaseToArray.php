<?php

namespace App\Traits\Enum;

trait EnumCaseToArray
{
    public static function toArray(): array
    {
        return array_column(self::cases(), 'value');
    }
}