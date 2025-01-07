<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class CourseMudels extends Model
{
    protected $table = 'tbl_course_modules';


    public function program(): HasMany
    {
        return $this->HasMany(TrineePrograms::class, 'course_id');
    }
    public function module()
    {
        return $this->belongsTo(TrineePrograms::class, 'module_id'); // Adjust the foreign key
    }
}
