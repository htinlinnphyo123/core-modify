<?php
namespace App\Enums;

enum Gender: string {

    case Male   = 'MALE';
    case Female = 'FEMALE';
    case Other  = 'OTHER';

    public static function toArray(): array
    {
        return array_column(self::cases(), 'name');
    }

}
