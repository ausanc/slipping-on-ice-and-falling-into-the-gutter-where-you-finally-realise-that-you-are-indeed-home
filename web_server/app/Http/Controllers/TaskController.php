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
        $user_id = $user->id;
        $house_id = $user->house_id;

        error_log("Trying to add completion of task ".$task_id." by user ".$user_id." in house ".$house_id);

        $task_house_id = Task::where('task_id', $task_id)->firstorfail()->house_id;

        if($house_id != $task_house_id) {
            return view('alerts.user_not_in_house');
        }

        CompletedTask::create([
            'task_id' => $task_id,
            'house_id' => $house_id,
            'user_id' => $user_id
        ]);
    
        return view('alerts.completion_success');
    }
}
