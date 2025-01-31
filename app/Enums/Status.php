<?php

namespace App\Enums;

use App\Traits\Enum\EnumCaseToArray;

enum Status : String
{
    use EnumCaseToArray;
    case active = "Active";
    case inactive = "Inactive";

}