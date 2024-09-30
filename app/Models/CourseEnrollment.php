<?php

namespace App\Models;

use App\Enums\EnrollmentStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

class CourseEnrollment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function course() : BelongsTo {
        return $this->belongsTo(Course::class);
    }

    public function student() : BelongsTo {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function scopeOnlyCompleted($query) : Builder {
        return $query->where('status', EnrollmentStatusEnum::COMPLETED->value);
    }

    public function scopeOnlyOngoing($query) : Builder {
        return $query->where('status', EnrollmentStatusEnum::ONGOING->value)->orWhereNull('status');
    }



    public function getStatusColorAttribute() : string {
        if (!$this->status) {
            return 'primary';
        }
        return $this->status == EnrollmentStatusEnum::ONGOING->value ? 'warning' : 'success';
    }

    public function getShowStatusAttribute() : string {
        return $this->status ??= 'Not started';
    }
}
