<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Institution extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name'
    ];

    protected $appends = [
        'courses_quantity'
    ];

    /**
     * @return HasMany
     */
    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function getCoursesQuantityAttribute()
    {
        return $this->courses()->count();
    }
}
