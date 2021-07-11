@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Home') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row justify-content-center mb-3 h1">
                        {{ __('Welcome to NearTicket ') }} {{ session('userName') }} <br>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-sm-6 d-flex justify-content-center mb-3">
                            <div class="card">
                                <div class="card-header">Look at your projects</div>
                                <div class="card-body">In this section of the website you can see your project</div>
                                <div class="card-footer"><a href="/projects" class="btn btn-primary">View projects</a></div>
                            </div>
                        </div>
                        <div class="col-sm-6 d-flex justify-content-center mb-3">
                            <div class="card">
                                <div class="card-header">Look at your team</div>
                                <div class="card-body">In this section of the website you can see your team</div>
                                <div class="card-footer"><a href="/team" class="btn btn-secondary">View team</a></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
