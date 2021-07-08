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

                    {{ __('Tickets from project:') }}<br>

                    <div class="row justify-content-center">
                        @foreach ($tickets as $ticket)
                            <div class="col-md-6 mb-3">
                                <div class="card">
                                    <div class="card-header"> {{$ticket->name}}</div>
                                    <div class="card-body">
                                        {{$ticket->description}} <br>
                                        {{$ticket->urgency}}<br>
                                        {{$ticket->gravity}}<br>
                                        {{$ticket->supervisor}}<br>
                                        {{$ticket->status}}<br>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="card-footer">
                    <a href="/projects" class="btn btn-info">go back</a>
                    <a href="#" class="btn btn-dark">create a ticket</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
