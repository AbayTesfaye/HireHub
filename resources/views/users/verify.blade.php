@extends('layout.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-header">Verify Account</div>
                <div class="card-body">
                    <p>Your account is not verified. Please verify account first</p>
                    <a href="{{route('resend.email')}}">Resend Verification link</a>
                </div>
            </div>
        </div>
    </div>
@endsection
