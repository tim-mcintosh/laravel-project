@extends('layout')
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
@section('content')
    <h1 class="title">Projects</h1>
<ul>
@foreach ($projects as $project)
    <li>
    <a href="/projects/{{$project->id}}">
    {{$project->title}}
    </a>
    </li>
@endforeach
</ul>
    <br>
    <form method="GET" action="/home">
        <div class="field">
            <div class="control">
                <button type="submit" class="button">Home</button>
            </div>
        </div>
    </form>
    <form method="GET" action="/projects/create">
        <div class="field">
            <div class="control">
                <button type="submit" class="button">Create Project</button>
            </div>
        </div>
    </form>
</html>
@endsection
