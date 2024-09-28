<?php

namespace App\Enums;

enum CourseStatusEnum: string
{
    case PUBLISHED = 'published';
    case DRAFT = 'draft';


    public static function toArray(): array {
        return array_map(fn($case) => $case->value, static::cases());
    }
}
