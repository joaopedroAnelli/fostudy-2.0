<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name',
        'months_per_season',
        'seasons_quantity'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'users_on_courses');
    }

    public function disciplines()
    {
        return $this->hasMany(Discipline::class);
    }
}