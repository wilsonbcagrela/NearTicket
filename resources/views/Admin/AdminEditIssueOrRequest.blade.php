@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit the ticket to be a issue or a request</div>

                <div class="card-body">
                    <form method="POST" action="EditTicketIssueRequest">
                        @csrf
                        <div class="form-group row">
                            <label for="status" class="col-md-4 col-form-label text-md-right">Status of ticket</label>

                            <div class="col-md-6">
                                <select class="form-control" name="status" id="status">
                                    <option value="NOT_INITIATED">Not iniciated</option>
                                    <option value="IN_PROGRESS">In progress</option>
                                    <option value="CONCLUDED">Conclude</option>
                                </select>
                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- <input type="hidden" name= "ticket_id" value="{{request('ticket_id')}}"> --}}
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Save changes
                                </button>
                            </div>
                        </div>
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
