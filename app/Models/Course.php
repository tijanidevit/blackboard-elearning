<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function enrollments() : HasMany {
        return $this->hasMany(CourseEnrollment::class);
    }


    public function tutor() : BelongsTo {
        return $this->belongsTo(Tutor::class);
    }

}
