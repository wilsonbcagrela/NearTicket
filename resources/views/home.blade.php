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

                    {{ __('you are logged in') }}<br>

                    <div class="row justify-content-center">
                        <a href="/user/projects" class="btn btn-primary">View projects</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
