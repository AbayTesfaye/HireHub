@extends('layout.app')
@section('content')
  <div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <h1>Looking for a job</h1>
            <h3>Create an Account</h3>
            <img src={{asset('image/click-here.jpg')}} alt="">
        </div>
        <div class="col-md-6">
            <div class="card">
            <div class="card-header">Register</div>
            <form action="{{ route('storeSeeker') }}" method="POST">
                @csrf
                 <div class="card-body">
                    <div class="form-group">
                        <label for="" >Full Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label for="" >Email</label>
                        <input type="text" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label for="" >Password</label>
                        <input type="text" class="form-control" name="password">
                    </div>
                    <br>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Register</button>
                    </div>
                 </div>
            </form>
            </div>
        </div>
    </div>
  </div>
@endsection
