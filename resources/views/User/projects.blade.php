@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Projects') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{-- <div class="row justify-content-center mb-3 h1">
                        {{ __('Projects') }}
                    </div> --}}
                    @if (session('TypeUser') == "User")
                        <div class="row justify-content-center">
                            @foreach ($projects as $project)
                                <div class="col-md-6 mb-3">
                                    <div class="card">
                                        <div class="card-header"> {{$project->name}}</div>
                                        <div class="card-body">{{$project->description}}</div>
                                        <div class="card-footer">
                                            <a href="/project/{{$project->id}}" class="btn btn-primary">View project</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    @if (session('TypeUser') == "Client")

                        @foreach ($projects as $project)
                            <div class="row justify-content-center">
                                @foreach ($project as $proj)
                                    <div class="col-md-6 mb-3">
                                        <div class="card">
                                            <div class="card-header"> {{$proj->name}}</div>
                                            <div class="card-body">{{$proj->description}}</div>
                                            <div class="card-footer">
                                                <a href="/project/{{$proj->id}}" class="btn btn-primary">View project</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
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
