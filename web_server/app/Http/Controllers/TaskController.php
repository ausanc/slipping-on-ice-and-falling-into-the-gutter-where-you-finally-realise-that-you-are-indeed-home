<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Task;
use App\CompletedTask;


class TaskController extends Controller
{
    public function completeTask($user_id, $task_id)
    {   
        $user_house_id = User::where('user_id', $user_id)->firstorfail()->house_id;
        $task_house_id = Task::where('task_id', $task_id)->firstorfail()->house_id;

        if($user_house_id != $task_house_id) {
            return "Mismatched records.";
        }

        CompletedTask::create([
            'task_id' => $task_id,
            'house_id' => $user_house_id,
            'user_id' => $user_id
        ]);
    
        return "Task complete.";
    }
}
