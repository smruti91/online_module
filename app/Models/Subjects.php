<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subjects extends Model
{
    protected $table = 'tbl_training_subjects';

    protected $fillable = ['subject_name'];

    public function course(): BelongsTo
    {
        return $this->belongsTo(CourseMudels::class, 'course_id');

    }

    public function topics(): HasMany
    {
        return $this->hasMany(Topics::class, 'subject_id');
    }
}
