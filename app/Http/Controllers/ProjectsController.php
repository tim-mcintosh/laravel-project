<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;
use Mail;
Use App\Mail\ProjectCreated;

class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        // $projects = Project::where('owner_id', auth()->id())->get();

        $projects = auth()->user()->projects;

        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function show(Project $project)
    {
        $this->authorize('view', $project);
        return view('projects.show', compact('project'));

    }

    public function edit(Project $project)
    {
        $this->authorize('view', $project);
        return view('projects.edit', compact('project'));

    }

    public function update(Project $project)
    {
       $project->update($this->validateProject());
        $this->authorize('view', $project);
        $project->update(request(['title', 'description']));

        return redirect('/projects');

    }

    public function destroy(Project $project)
    {
        $this->authorize('view', $project);

        $project->delete();

        return redirect('/projects');

    }

    public function store()
    {

        $attributes = ($this->validateProject());

       $attributes['owner_id'] = auth()->id();

       $project = Project::create($attributes);

       Mail::to($project->owner->email)->send(
           new ProjectCreated($project)
       );


        return redirect('/projects');

        /*
       request()->validate([
           'title' => ['required', 'min:3'],
           'description' => 'required'
       ]);

       Project::create(request(['title','description']));

       */
    }

    public function validateProject()
    {
        return request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:3']
        ]);
    }
}

