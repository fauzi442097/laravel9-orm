<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use App\Models\Task;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $projects = Project::latest('id')
            ->with(['users', 'users.tasks', 'projectTasks'])
            ->withCount(['projectTasks', 'comments'])
            ->has('users')
            ->get();

        return view('projects.index', [
            'projects' => $projects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $project = Project::factory()->create();

        User::factory(rand(1, 5))->make()->each(function ($user) use ($project) {
            $user->project_id = $project->id;
            $user->save();

            // Create Task
            Task::factory(rand(1, 3))->make()->each(function ($task) use ($user) {
                $task->user_id = $user->id;
                $task->save();
            });
        });


        return redirect('/projects');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }
}
