<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProgress extends Model
{
    protected $table = 'tbl_user_progress';
    protected $fillable = ['user_id', 'program_id', 'subject_id', 'topic_id', 'status'];
}
