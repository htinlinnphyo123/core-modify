<?php

namespace App\Enums;

use App\Traits\Enum\EnumCaseToArray;

enum Gender :string
{
    use EnumCaseToArray;
    case Male = 'MALE';
    case Female = 'FEMALE';
    case Other = 'OTHER';

}