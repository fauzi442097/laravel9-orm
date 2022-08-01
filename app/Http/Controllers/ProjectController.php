<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use App\Models\Task;
use Database\Factories\UserFactory;
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

        // $project1 = Project::create([
        //     'title' => 'Project 1'
        // ]);

        // $project2 = Project::create([
        //     'title' => 'Project 2'
        // ]);

        // $user1 = User::factory()->create();
        // $user2 = User::factory()->create();
        // $user3 = User::factory()->create();

        // // Assign to project_user
        // $project1->users()->attach($user1);
        // $project1->users()->attach($user2);
        // $project1->users()->attach($user3);

        // $project2->users()->attach($user1);
        // $project2->users()->attach($user2);
        // $project2->users()->attach($user3);

        // dd('tes');

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
