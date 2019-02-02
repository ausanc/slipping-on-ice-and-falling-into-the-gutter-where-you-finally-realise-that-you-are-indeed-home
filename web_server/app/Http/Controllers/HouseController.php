<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

use App\Task;
use App\User;
use App\House;

class HouseController extends Controller
{
    public function getHouseTasks($user_id)
    {
        $user = User::where('user_id', $user_id)->first();
        $house_tasks = Task::where('house_id', $user->house_id)->get();
        
        return $house_tasks;
    }
}
