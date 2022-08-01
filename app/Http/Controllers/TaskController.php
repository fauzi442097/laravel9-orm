<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //
    public function index()
    {
        // With BelongsToThrough
        $tasks = Task::with('projects')->get();


        return view('tasks.index', [
            'tasks' => $tasks
        ]);
    }
}
