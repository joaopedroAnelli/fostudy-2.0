<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'course_id',
        'season'
    ];

    public function classes()
    {
        return $this->hasMany(SClass::class, 'discipline_id');
    }

}