<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PracticeQuestions extends Model
{
    protected $table = 'tbl_questions';

    protected $fillable = ['course_id','subject_id','question_title'];

    public function options(): HasMany
    {
        return $this->hasMany(PracticeQuestionOptions::class,'question_id');
    }
}
