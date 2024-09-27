<?php

namespace App\Models;

use App\Enums\CourseStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;
use Cviebrock\EloquentSluggable\Sluggable;

class Course extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    protected $attributes = [
        'status' => CourseStatusEnum::DRAFT->value
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function enrollments() : HasMany {
        return $this->hasMany(CourseEnrollment::class);
    }

    public function modules() : HasMany {
        return $this->hasMany(CourseModule::class);
    }

    public function tutor() : BelongsTo {
        return $this->belongsTo(Tutor::class);
    }


    public function scopeOnlyDraft($query) : Builder {
        return $query->whereStatus(CourseStatusEnum::DRAFT->value);
    }

    public function scopeOnlyActive($query) : Builder {
        return $query->whereStatus(CourseStatusEnum::ACTIVE->value);
    }

    public function getExcerptAttribute() : string {
        $length = 50;
        $cleanContent = strip_tags($this->description);
        return mb_strimwidth($cleanContent, 0, $length, '...');
    }

}
