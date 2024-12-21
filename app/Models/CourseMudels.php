<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CourseMudels extends Model
{
    protected $table = 'tbl_course_modules';
    public function module()
    {
        return $this->belongsTo(TrainingModules::class, 'module_id'); // Adjust the foreign key
    }
}
