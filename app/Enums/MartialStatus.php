<?php

namespace App\Enums;

enum MartialStatus : string
{
    case SINGLE = 'single';
    case MARRIED = 'married';
    case DIVORCED = 'divorced';
    case WIDOWED = 'widowed';
}