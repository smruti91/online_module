<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TraineeEnrolledPrograms extends Model
{
    protected $table = 'tbl_trainee_enrolled_programs';

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];
    // Relationship with Programs
    public function program(): BelongsTo
    {
        return $this->belongsTo(TrineePrograms::class, 'program_id');
    }
}
