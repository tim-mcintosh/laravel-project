@extends('layout')


@section('content')

    <h1 class="title">{{ $project->title }}</h1>
    <div class="content">{{$project->description}}</div>

    @if ($project->tasks->count())
    <div>
        @foreach ($project->tasks as $task)
            <div>
                <form method="POST" action="/tasks/{{$task->id}}">
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

    <form action="">
        <div class="field">
            <label for="">

            </label>
        </div>
    </form>

    <form method="GET" action="/projects/{{$project->id}}/edit">
        <div class="field">
            <div class="control">
                <button type="submit" class="button">Edit</button>
            </div>
        </div>
    </form>
@endsection
