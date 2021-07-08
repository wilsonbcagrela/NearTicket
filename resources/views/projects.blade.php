@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Your projects:') }}<br>

                    <div class="row justify-content-center">
                        @foreach ($projects as $project)
                            <div class="col-md-6 mb-3">
                                <div class="card">
                                    <div class="card-header"> {{$project->name}}</div>
                                    <div class="card-body">{{$project->description}}</div>
                                    <div class="card-footer">
                                        <a href="/project/{{$project->id}}/tickets" class="btn btn-primary">View tickets</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="card-footer">
                    <a href="/home" class="btn btn-info">Go back</a>
                    <a href="/project/create" class="btn btn-dark">Create a Project</a>
                    <a href="#" class="btn btn-secondary">Add users to a project</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
