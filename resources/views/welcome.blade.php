@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body text-center">
                    <img src="public\NearTicketLogo.png" alt="Logo">
                    {{-- <img src="{{ Storage::get(.'public/images/NearTicketLogo.png') }}" alt="Logo"> --}}
                    <h3>Welcome to NearTicket</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
