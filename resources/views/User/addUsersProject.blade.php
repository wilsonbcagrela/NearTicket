@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add user to project</div>

                <div class="card-body">
                    <form method="POST" action="addUserToProject">
                        @csrf
                        <div class="form-group row">
                            <label for="userName" class="col-md-4 col-form-label text-md-right">User name</label>

                            <div class="col-md-6">
                                <input id="userName" type="text" class="form-control @error('userName') is-invalid @enderror" name="userName" required autocomplete="userName" autofocus>

                                @error('userName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
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
