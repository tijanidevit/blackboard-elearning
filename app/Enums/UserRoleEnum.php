<?php

namespace App\Enums;

enum UserRoleEnum: string
{
    case ADMIN = 'admin';
    case STUDENT = 'student';
    case TUTOR = 'tutor';


    public static function toArray(): array {
        return array_map(fn($case) => $case->value, static::cases());
    }
}
