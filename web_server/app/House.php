<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class House extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'house_name',
    ];

    protected $with = [
        'users', 'tasks',
    ];

    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function tasks()
    {
        return $this->hasMany('App\Task');
    }
}
