<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Request;

use App\User;
use App\Task;
use App\House;
use App\CompletedTask;


class HouseController extends Controller
{
    public function displayTaskList(){
        $user = Auth::user();

        $house = House::find($user->house_id);
        $house_tasks = $house->tasks;

        return view('task_list', ['tasks' => $house_tasks]);
    }

    public function getTask($task_id)
    {
        $task = Task::findOrFail($task_id);

        return view('task', ['task' => $task]);
    }

    public function newTask(Request $request)
    {
        // return $request;

        Task::create([
            'task_name' => $request['task_name'],
            'task_description' => $request['description'],
            'house_id' => 1,
        ]);

        return redirect()->route('home');
    }
}
