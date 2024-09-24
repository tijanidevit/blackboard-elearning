<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ModuleContent extends Model
{
    use HasFactory;

    protected $guarded = ['id'];



    public function module() : BelongsTo {
        return $this->belongsTo(CourseModule::class);
    }

}
