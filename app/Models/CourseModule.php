<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CourseModule extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function course() : BelongsTo {
        return $this->belongsTo(Course::class);
    }

    public function contents() : HasMany {
        return $this->hasMany(ModuleContent::class, 'module_id');
    }

}
