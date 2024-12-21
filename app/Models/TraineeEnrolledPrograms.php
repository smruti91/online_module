<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TraineeEnrolledPrograms extends Model
{
    protected $table = 'tbl_trainee_enrolled_programs';

    // Relationship with Programs
    public function program(): BelongsTo
    {
        return $this->belongsTo(TrainingPrograms::class, 'program_id');
    }
}
