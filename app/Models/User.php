<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\UserRoleEnum;
use App\Enums\UserStatusEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'role',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    protected $attributes = [
        'role' => UserRoleEnum::STUDENT->value,
        'status' => UserStatusEnum::ACTIVE->value,
    ];

    public function tutor() : HasOne {
        return $this->hasOne(Tutor::class);
    }



    public function scopeOnlyTutor($query) : Builder {
        return $query->whereStatus(UserRoleEnum::TUTOR->value);
    }

    public function scopeOnlyStudent($query) : Builder {
        return $query->whereStatus(UserRoleEnum::STUDENT->value);
    }

    public function scopeOnlyAdmin($query) : Builder {
        return $query->whereStatus(UserRoleEnum::ADMIN->value);
    }

    public function isAdmin() : bool {
        return $this->role == UserRoleEnum::ADMIN->value;
    }

    public function isTutor() : bool {
        return $this->role == UserRoleEnum::TUTOR->value;
    }

    public function isStudent() : bool {
        return $this->role == UserRoleEnum::STUDENT->value;
    }
}
