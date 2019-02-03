<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Task;


class HouseController extends Controller
{
    public function getHouseTasks($user_id)
    {
        $user = User::where('id', $user_id)->first();
        $house_tasks = Task::where('house_id', $user->house_id)->get();
        
        return $house_tasks;
    }
}