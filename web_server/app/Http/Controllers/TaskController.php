<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Task;
use App\User;
use App\CompletedTask;


class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function completeTask($task_id)
    {   
        $user = Auth::user();

        $task = Task::findOrFail($task_id);

        if($user->house_id != $task->house_id) {
            return view('alerts.user_not_in_house');
        }

        CompletedTask::create([
            'task_id' => $task->id,
            'house_id' => $task->house_id,
            'user_id' => $user->id
        ]);
    
        return view('alerts.completion_success');
    }
}
