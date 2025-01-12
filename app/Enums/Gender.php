<?php

namespace App\Enums;

use App\Traits\Enum\EnumCaseToArray;

enum Gender :string
{
    use EnumCaseToArray;
    case Male = 'male';
    case Female = 'female';
    case Other = 'other';
}