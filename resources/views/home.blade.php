@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">Project Menu</div>
                <form method="GET" action="/projects/create">
                    @csrf
                    <button type="submit" class="button is-link">Create Project</button>
                </form>
                <form method="GET" action="/projects">
                    @csrf
                    <button type="submit" class="button is-link">Project List</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
