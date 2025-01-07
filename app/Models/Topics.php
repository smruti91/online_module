<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Topics extends Model
{
    protected $table = 'tbl_training_topics';
    protected $fillable = ['topic_name', 'ppt_file', 'subject_id'];


    public function subject()
    {
        return $this->belongsTo(Subjects::class, 'subject_id');
    }
}
