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
}