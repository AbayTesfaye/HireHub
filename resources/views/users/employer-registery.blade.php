@extends('layout.app')
@section('content')
  <div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <h1>Looking for an Employee</h1>
            <h3>Create an Account</h3>
            <img src={{asset('image/click-here.jpg')}} alt="">
        </div>
        <div class="col-md-6">
            <div class="card">
            <div class="card-header">Employer Registration</div>
            <form action="#" method="POST">
                @csrf
                 <div class="card-body">
                    <div class="form-group">
                        <label for="" >Company Name</label>
                        <input type="text" class="form-control" name="name">
                        @if ($errors->has('name'))
                         <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif

                    </div>
                    <div class="form-group">
                        <label for="" >Email</label>
                        <input type="text" class="form-control" name="email">
                        @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif

                    </div>
                    <div class="form-group">
                        <label for="" >Password</label>
                        <input type="text" class="form-control" name="password">
                        @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif

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
