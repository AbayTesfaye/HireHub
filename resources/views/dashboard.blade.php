@extends('layout.admin.main')
@section('content')
    <div class="container mt-s">
        Hello, {{ auth()->User()->name }}
        @if (!auth()->user()->billing_ends)
            @if (Auth::check() && auth()->user()->user_type == 'Employer')
                <p>Your trial {{ now()->format('Y-m-d') > auth()->user()->user_trial ? 'was expired' : 'will expire' }} on
                    {{ auth()->user()->user_trial }}</p>
            @endif
        @endif
        <div class="row justify-content-center ">
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if (Session::has('error'))
                <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif
            <div class="col-md-3">
                <div class="card-counter primary">
                    <p class="text-center mt-3 lead">User Profile</p>
                    <button class="btn btn-primary float-end">View</button>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-counter danger">
                    <p class="text-center mt-3 lead">Post Job</p>
                    <button class="btn btn-primary float-end">View</button>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-counter success">
                    <p class="text-center mt-3 lead">All Jobs</p>
                    <button class="btn btn-primary float-end">View</button>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card-counter info">
                    <p class="text-center mt-3 lead">Item 4</p>
                    <button class="btn btn-primary float-end">View</button>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    .card-counter {
        box-shadow: 2px 2px 10px #DADADA;
        margin: 5px;
        padding: 20px 10px;
        background-color: #fff;
        height: 130px;
        border-radius: 5px;
        transition: .3s linear all;
    }

    .card-counter.primary {
        background-color: #007bff;
        color: #fff;
    }

    .card-counter.danger {
        background-color: #ef5350;
        color: #fff;
    }

    .card-counter.success {
        background-color: #66bb6a;
        color: #fff;
    }

    .card-counter.info {
        background-color: #26c6da;
        color: #fff;
    }
</style>
