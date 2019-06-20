<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SClass extends Model
{
    protected $table = 'classes';
    public $timestamps = false;

    protected $guarded = ['id', 'absence'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'absences', 'class_id', 'student_id');
    }
}