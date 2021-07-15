@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update a ticket</div>

                <div class="card-body">
                    <form method="POST" action="editTicketUser">
                        @csrf
                        @foreach ($tickets as $ticket)
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" value="{{$ticket->name}}" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                                <div class="col-md-6">
                                    <textarea id="description" type="textarea" class="form-control" name="description" required autocomplete="description" rows="3">{{$ticket->description}}</textarea>

                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="deadLine" class="col-md-4 col-form-label text-md-right">Dead line</label>

                                <div class="col-md-6">
                                    <input id="deadLine" type="date" value="{{$ticket->deadLine}}" class="form-control" name="deadLine" required autocomplete="description">

                                    @error('deadLine')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gravity" class="col-md-4 col-form-label text-md-right">gravity</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="gravity" id="gravity" required autocomplete="gravity">
                                        <option value="" disabled selected>Choose option</option>
                                        <option value="MILD">Mild</option>
                                        <option value="MEDIUM">Medium</option>
                                        <option value="SERIOUS">Serious</option>
                                    </select>
                                    @error('gravity')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="urgency" class="col-md-4 col-form-label text-md-right">Urgent</label>

                                <div class="col-md-6">
                                    @if($ticket->urgency == 1)
                                        <input class="form-control" type="checkbox" id="urgency" name="urgency" value="1" checked>
                                    @else
                                        <input class="form-control" type="checkbox" id="urgency" name="urgency" value="1">
                                    @endif
                                    @error('urgency')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </form>
                </div>
                <div class="card-footer">
                    <a href="/project/{{request('project_id')}}" class="btn btn-info">Go back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
