<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
    protected $guarded = ['id'];
    public $timestamps = false;

    public function discipline()
    {
        return $this->belongsTo(Discipline::class);
    }
}
