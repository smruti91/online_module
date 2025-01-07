<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PracticeTest extends Model
{
    protected $table = 'tbl_practice_test_master';

    public function programs(): BelongsTo
    {
        return $this->belongsTo(TrineePrograms::class, 'program_id');

    }
    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subjects::class, 'subject_id');

    }
}
