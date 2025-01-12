<?php

namespace App\Enums;

use App\Traits\Enum\EnumCaseToArray;

enum MartialStatus : string
{
    use EnumCaseToArray;
    case SINGLE = 'single';
    case MARRIED = 'married';
    case DIVORCED = 'divorced';
    case WIDOWED = 'widowed';
}