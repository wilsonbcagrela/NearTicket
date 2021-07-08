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
                        {{ __('Welcome to NearTicket ') }} {{ session('userName') }} :-)<br>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-sm d-flex justify-content-center mb-3">
                            <a href="/projects" class="btn btn-primary">View projects</a>
                        </div>
                        <div class="col-sm d-flex justify-content-center mb-3">
                            <a href="/team" class="btn btn-secondary">View team</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
