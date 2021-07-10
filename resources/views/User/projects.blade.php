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
                    <div class="row justify-content-center mb-3 h1">
                        {{ __('projects') }}
                    </div>
                    @if (session('TypeUser') == "User")
                        <div class="row justify-content-center">
                            @foreach ($projects as $project)
                                <div class="col-md-6 mb-3">
                                    <div class="card">
                                        <div class="card-header"> {{$project->name}}</div>
                                        <div class="card-body">{{$project->description}}</div>
                                        <div class="card-footer">
                                            <a href="/project/{{$project->id}}" class="btn btn-primary">View project</a>
                                            {{-- <a href="#" class="btn btn-secondary">Add users to project</a>
                                            <a href="#" class="btn btn-dark">Project team</a> --}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    @if (session('TypeUser') == "Client")
                        @foreach ($projects as $project)
                            @foreach ($project as $bruh)
                                {{$bruh->name}} <br>
                            @endforeach
                        @endforeach
                    @endif
                </div>
                <div class="card-footer">
                    <a href="/home" class="btn btn-info">Go back</a>
                    @if (session('TypeUser') == "User")
                        <a href="/project/create" class="btn btn-dark">Create a Project</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
