@extends('layout.app')
@section('content')
    <div class="container mt-s">
        <div class="row justify-content-center">
            {{auth()->User()->name}}
            {{auth()->user()->email}}
        </div>
    </div>
@endsection
