@extends('layout')


@section('content')

    <h1 class="title">{{ $project->title }}</h1>
    <div class="content">{{$project->description}}</div>

    @if ($project->tasks->count())
    <div>
        @foreach ($project->tasks as $task)
            <div>
                <form class="box" method="POST" action="/tasks/{{$task->id}}">
                    @method('PATCH')
                    @csrf
                    <label class="checkbox" {{$task->completed ? 'is-complete' : ''}} for="completed">
                        <input type="checkbox" name="completed" onChange="this.form.submit()" {{$task->completed ? 'checked' : ''}}>
                        {{$task->body}}
                    </label>
                </form>
            </div>
            @endforeach
    </div>
    @endif

    <form class="box" method="POST" action="/projects/{{$project->id}}/tasks">
        @csrf
        <div class="field">
            <label class="label" for="body">
                New Task
            </label>
            <div class="control">
                <input type="text" class="input" name="body" placeholder="New task">
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Add Task</button>
            </div>

        </div>

        @include('errors')


    </form>



    <form method="GET" action="/projects/{{$project->id}}/edit">
        <div class="field">
            <div class="control">
                <button type="submit" class="button">Edit</button>
            </div>
        </div>
    </form>

    <form method="GET" action="/projects">
        <div class="field">
            <div class="control">
                <button type="submit" class="button">Back</button>
            </div>
        </div>
    </form>
@endsection
