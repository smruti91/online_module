<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PracticeQuestionOptions extends Model
{
    protected $table = 'tbl_options';

    protected $fillable = ['question_id','option_label','option_value','is_correct'];

    public function question(): BelongsTo
    {
        return $this->belongsTo(PracticeQuestions::class,'id');
    }
}
