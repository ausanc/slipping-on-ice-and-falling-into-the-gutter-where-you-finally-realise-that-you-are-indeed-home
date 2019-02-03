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
    public function getHouseTasks()
    {
        $user = Auth::user();

        $house_tasks = Task::where('house_id', $user->house_id)->get();
        
        return $house_tasks;
    }

    public function displayTaskList(){
        $user = Auth::user();

        $house = House::find($user->house_id);
        $house_tasks = $house->tasks;

        return view('task_list', ['tasks' => $house_tasks]);
    }
}
