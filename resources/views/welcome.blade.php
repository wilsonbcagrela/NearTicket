@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body text-center">
                    <h3>Welcome to NearTicket</h3>
                    <img src="{{URL('images/NearTicketLogo.png')}}" alt="Logo">
                    {{-- <img src="{{ Storage::get(.'public/images/NearTicketLogo.png') }}" alt="Logo"> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
