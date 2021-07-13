@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Comments') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            @foreach ($tickets as $ticket)
                                    <div class="card mb-3">
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
                                                <b>This ticket is a issue </b><br>
                                            @endif
                                            @if ($ticket->isRequest == true)
                                                <b>This ticket is a request </b><br>
                                            @endif
                                            <b>Created: </b> {{$ticket->creationDate}} <br>
                                            <b>Dead line: </b> {{$ticket->deadLine}} <br>
                                            <b>Owner: </b> {{$ticket->owner}}<br>
                                        </div>
                                    </div>
                            @endforeach
                        </div>
                    </div>
                    {{-- <div class="border mb-3"> --}}
                        <form method="POST" action="postComment">
                            @csrf
                            <div class="row justify-content-center mt-3">
                                <div class="col-md-6 mb-1">
                                    <input type="text" name="text" placeholder="Add a comment" class="form-control">
                                </div>
                                <div class="col-md-1 mb-1">
                                    <button type="submit" class="btn btn-primary">
                                        Comment
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="row justify-content-center mt-3">
                            @foreach ($comments as $comment)
                                <div class="col-md-7">
                                    <div class="card mb-3">
                                        <div class="card-header">
                                            {{$comment->owner}} at {{$comment->creationDate}}
                                        </div>
                                        <div class="card-body">
                                            {{$comment->text}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    {{-- </div> --}}
                </div>
                <div class="card-footer">
                    <a href="/project/{{request('project_id')}}" class="btn btn-info">Go back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
