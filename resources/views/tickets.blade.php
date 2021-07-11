@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Tickets') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row justify-content-center">
                        <div class="col-md-4 mb-3">
                            <div class="mb-3 h3">Tickets not initiated: </div>
                            @foreach ($tickets as $ticket)
                                @if($ticket->status == "NOT_INITIATED")
                                    <div class="card">
                                        <div class="card-header"><b>Name: </b> {{$ticket->name}}</div>
                                        <div class="card-body">

                                            <b>Description </b>{{$ticket->description}} <br>
                                            @if($ticket->urgency==1)
                                                <b class="text-danger">! Urgent !</b><br>
                                            @endif
                                            <b>gravity: </b> {{$ticket->gravity}}<br>
                                            @if ($ticket->supervisor !="")
                                                <b>supervisor: </b> {{$ticket->supervisor}}<br>
                                            @endif
                                            {{-- <b>status: </b>{{$ticket->status}}<br> --}}
                                            @if ($ticket->isIssue == true)
                                                <b>This ticket is a issue </b>
                                            @endif
                                            @if ($ticket->isRequest == true)
                                                <b>This ticket is a request </b>
                                            @endif
                                        </div>
                                        <div class="card-footer">
                                            <a href="#" class="btn btn-primary">Edit</a>
                                            <a href="#" class="btn btn-secondary">Delete</a>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="mb-3 h3">Tickets in progress: </div>
                            @foreach ($tickets as $ticket)
                                @if($ticket->status == "IN_PROGRESS")
                                    <div class="card">
                                        <div class="card-header"><b>Name: </b> {{$ticket->name}}</div>
                                        <div class="card-body">

                                            <b>Description </b>{{$ticket->description}} <br>
                                            @if($ticket->urgency==1)
                                                <b class="text-danger">! Urgent !</b><br>
                                            @endif
                                            <b>gravity: </b> {{$ticket->gravity}}<br>
                                            @if ($ticket->supervisor !="")
                                                <b>supervisor: </b> {{$ticket->supervisor}}<br>
                                            @endif
                                            {{-- <b>status: </b>{{$ticket->status}}<br> --}}
                                            @if ($ticket->isIssue == true)
                                                <b>This ticket is a issue </b>
                                            @endif
                                            @if ($ticket->isRequest == true)
                                                <b>This ticket is a request </b>
                                            @endif
                                        </div>
                                        <div class="card-footer">
                                            <a href="#" class="btn btn-primary">Edit</a>
                                            <a href="#" class="btn btn-secondary">Delete</a>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="mb-3 h3">Tickets concluded: </div>
                            @foreach ($tickets as $ticket)
                                @if($ticket->status == "CONCLUDED")
                                    <div class="card">
                                        <div class="card-header"><b>Name: </b> {{$ticket->name}}</div>
                                        <div class="card-body">

                                            <b>Description </b>{{$ticket->description}} <br>
                                            @if($ticket->urgency==1)
                                                <b class="text-danger">! Urgent !</b><br>
                                            @endif
                                            <b>gravity: </b> {{$ticket->gravity}}<br>
                                            @if ($ticket->supervisor !="")
                                                <b>supervisor: </b> {{$ticket->supervisor}}<br>
                                            @endif
                                            {{-- <b>status: </b>{{$ticket->status}}<br> --}}
                                            @if ($ticket->isIssue == true)
                                                <b>This ticket is a issue </b>
                                            @endif
                                            @if ($ticket->isRequest == true)
                                                <b>This ticket is a request </b>
                                            @endif
                                        </div>
                                        <div class="card-footer">
                                            <a href="#" class="btn btn-primary">Edit</a>
                                            <a href="#" class="btn btn-secondary">Delete</a>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="row justify-content-center mb-3 h1">
                        {{ __('Team of this project') }}<br>
                    </div>
                    <div class="row justify-content-center">
                        @foreach ($TeamMembers as $TeamMember)
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-header"> <b>User name: </b>{{$TeamMember->userName}}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row justify-content-center mb-3 h1">
                        {{ __('Admins of this project') }}<br>
                    </div>
                    <div class="row justify-content-center">
                        @foreach ($TeamMembersAdmins as $TeamMembersAdmin)
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-header"> <b>User name: </b>{{$TeamMembersAdmin->userName}}</div>
                                    <div class="card-body">
                                        <b>Role: </b> {{$TeamMembersAdmin->role}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                <div class="card-footer">
                    <a href="/projects" class="btn btn-info">Go back</a>
                    <a href="/project/{{request('project_id')}}/create/ticket" class="btn btn-secondary">Create a ticket</a>
                    <a href="#" class="btn btn-dark">Add users to project</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
