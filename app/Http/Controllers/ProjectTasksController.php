<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Project;

class ProjectTasksController extends Controller
{
    public function update(Task $task)
    {
        /* Option 1
        if (request()->has('completed')){
            $task->complete();
        } else {
            $task->incomplete();
        }
        */

        /* Option 2
        request()->has('complete') ? $task->complete() : $task->incomplete();
        */

        $method = request()->has('completed') ? 'complete' : 'incomplete';

        $task->$method();


        /* Old school method of updating via controller not model
        $task->update([
            'completed' => request()->has('completed')
        ]);
        */

        return back();
    }

    public function store(Project $project)
    {
        /* Second method using model */
        $attributes = request()->validate(['body'=> 'required']);
        $project->addTask($attributes);

        return back();


        /* First method

        Task::create([
            'project_id' => $project->id,
            'body' => request('body')
        ]);
        */


    }
}
