<?php

namespace App\Enums;

enum SponsorAdPosition: string
{
    case Header = 'Header';
    case Center = 'Center';
    case Footer = 'Footer';
    case Video_Section = 'Video_Section';

    public static function toArray(): array
    {
        return array_column(SponsorAdPosition::cases(), 'value');
    }
}
