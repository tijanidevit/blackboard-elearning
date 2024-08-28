<?php

namespace App\Enums;

enum UserStatusEnum: string
{
    case PENDING = 'pending';
    case APPROVED = 'approved';
    case DECLINED = 'declined';


    public static function toArray(): array {
        return array_map(fn($case) => $case->value, static::cases());
    }
}
