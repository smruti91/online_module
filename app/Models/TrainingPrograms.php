<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TrainingPrograms extends Model
{
    protected $table = 'tbl_training_programs';

    public function course(): BelongsTo
    {
        return $this->belongsTo(CourseMudels::class, 'course_id');
    }

}
