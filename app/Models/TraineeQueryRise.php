<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TraineeQueryRise extends Model
{
    protected $table = 'tbl_query_rise';
    protected $fillable = ['user_id', 'program_id', 'topic_id', 'query_type', 'status'];

    public function techQuery()
    {
        return $this->belongsTo(TechQuery::class, 'techQueryId', 'id'); // Assuming techQueryId is the foreign key
    }

    public function topic()
    {
        return $this->belongsTo(Topics::class, 'topic_id', 'id');
    }
}
