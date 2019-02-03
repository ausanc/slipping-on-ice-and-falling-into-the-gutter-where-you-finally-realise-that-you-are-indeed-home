<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'task_name', 'task_description', 'house_id',
    ];

    protected $with = array('completedTasks');


    public function house()
    {
        return $this->belongsTo('App\House');
    }

    public function completedTasks()
    {
        return $this->hasMany('App\CompletedTask');
    }
}
