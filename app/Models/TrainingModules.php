<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TrainingModules extends Model
{
    protected $table = 'tbl_training_modules';

    public function courses(): HasMany
    {
        return $this->hasMany(CourseMudels::class, 'module_id'); // Adjust the foreign key as per your DB
    }
}
