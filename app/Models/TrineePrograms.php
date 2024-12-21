<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TrineePrograms extends Model
{
    protected $table = 'tbl_trainee_programs';

    protected $fillable = [
        'module_id',
        'course_id',
        'program_id',
        'start_date',
        'end_date',
        'en_start_date',
        'en_end_date',
        'status',
    ];

    // Relationship with Training Modules
    public function module(): BelongsTo
    {
        return $this->belongsTo(TrainingModules::class, 'module_id');
    }

    // Relationship with Course Modules
    public function course(): BelongsTo
    {
        return $this->belongsTo(CourseMudels::class, 'course_id');
    }

    // Relationship with Programs
    public function program(): BelongsTo
    {
        return $this->belongsTo(TrainingPrograms::class, 'program_id');
    }

    // Relationship with VC Dates
    public function programVcDates(): HasMany
    {
        return $this->hasMany(programsVC::class, 'program_id', 'program_id');
    }
}
