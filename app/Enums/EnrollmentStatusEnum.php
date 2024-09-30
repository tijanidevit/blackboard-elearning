<?php

namespace App\Enums;

enum EnrollmentStatusEnum: string
{
    case ONGOING = 'ongoing';
    case COMPLETED = 'completed';


    public static function toArray(): array {
        return array_map(fn($case) => $case->value, static::cases());
    }
}
