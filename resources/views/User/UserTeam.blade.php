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
                    <div class="row justify-content-center">
                        <div class="col-md-3 mb-3 h1">
                            {{ __('Your Client') }}
                        </div>

                        <div class="col-md-9 mb-3">
                            <div class="card ">
                                <div class="card-body">
                                    @foreach ($client as $Company)
                                        {{$Company->name}} <br>
                                        {{$Company->email}} <br>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3 h1">
                            {{ __('Your Team') }}
                        </div>

                        <div class="col-md-9 mb-3">
                            @foreach ($team as $member)
                                <div class="card">
                                    {{-- <div class="card-header"> {{$member->userName}}</div> --}}
                                    <div class="card-body">

                                            {{$member->userName}} <br>
                                            {{$member->email}} <br>

                                    </div>
                                    {{-- <div class="card-footer">
                                        <a href="/project/{{$project->id}}/tickets" class="btn btn-primary">View tickets</a>
                                        <a href="#" class="btn btn-secondary">Add users to project</a>
                                        <a href="#" class="btn btn-dark">Project team</a>
                                    </div> --}}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="/home" class="btn btn-info">Go back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
