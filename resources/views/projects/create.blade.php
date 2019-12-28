<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
@extends('layout')


@section('content')


<h1 class="title">Create a new project</h1>

<form method="POST" action="/projects">
    {{csrf_field()}}
    <div>
        <input class="input {{ $errors->has('title') ? 'is-danger' : '' }}" type="text" name="title" placeholder="Project title" value="{{old('title')}}">
    </div>
    <div>
        <textarea class="textarea {{ $errors->has('description') ? 'is-danger' : '' }}" name="description" cols="30" rows="10" placeholder="Project description">{{old('description')}}</textarea>
    </div>
    <div>
        <button type="submit" class="button is-link">Create Project</button>
    </div>

    @if ($errors->any())
        <div class="notification is-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
</form>

</html>

@endsection
