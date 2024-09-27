<?php

namespace App\Enums;

enum CourseCategoryEnum: string
{
    case WEB_DEV = 'Web Development';
    case AI = 'Artificial Intelligence';
    case ML = 'Machine Learning';
    case DB = 'Database';
    case OTHERS = 'Others';


    public static function toArray(): array {
        return array_map(fn($case) => $case->value, static::cases());
    }
}
