<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompletedTask extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'task_id', 'house_id', 'user_id',
    ];

    protected $with = [
        'user',
    ];


    public function task()
    {
        return $this->belongsTo('App\Task');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
