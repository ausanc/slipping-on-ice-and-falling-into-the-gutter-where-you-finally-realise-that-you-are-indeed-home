<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Task;
use App\House;
use App\CompletedTask;


class HouseController extends Controller
{
    public function getHouseTasks($user_id)
    {
        $user = User::where('id', $user_id)->first();
        $house_tasks = Task::where('house_id', $user->house_id)->get();
        
        return $house_tasks;
    }

    // public function displayTaskList(){
    //     $user = Auth::user();
    //     $tasks = Task::where('house_id', $user->house_id)->get();
    //     foreach ($tasks as $taskKey => $task) {
    //         $task["completed"] = CompletedTask::where('task_id', $task->task_id)->orderBy('created_at', 'desc')->get();

    //         foreach ($task["completed"] as $key => $completed_task) {
    //             $task["completed"][$key]["user"] = User::findOrFail($completed_task->user_id);
    //         }
    //     }



    //     return view('task_list', ['tasks' => $tasks]);
    // }
    public function displayTaskList(){
        $user = Auth::user();

        $house = House::find($user->house_id);
        $house_tasks = $house->tasks;

        return view('task_list', ['tasks' => $house_tasks]);
    }
}
