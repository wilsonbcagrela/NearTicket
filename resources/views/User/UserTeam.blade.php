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
                            {{ __('Client') }}
                        </div>
                        @if (session('TypeUser') == "User")
                            <div class="col-md-9 mb-3">
                                <div class="card ">
                                    <div class="card-body">
                                        @foreach ($client as $Company)
                                            <b>Company name: </b>{{$Company->name}} <br>
                                            <b>Company email:</b> {{$Company->email}} <br>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if (session('TypeUser') == "Client")
                        <div class="col-md-9 mb-3">
                            <div class="card ">
                                <div class="card-body">
                                    <b>Company name: </b>{{session('userName')}} <br>
                                    <b>Company email:</b> {{session('email')}} <br>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="col-md-3 mb-3 h1">
                            {{ __('Team') }}
                        </div>

                        <div class="col-md-9 mb-3">
                            @foreach ($team as $member)
                                <div class="card">
                                    <div class="card-body">
                                        <b> Username:</b> {{$member->userName}} <br>
                                        <b> Name: </b>{{$member->firstName}} {{$member->lastName}} <br>
                                        <b>Email: </b>{{$member->email}} <br>
                                    </div>
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
