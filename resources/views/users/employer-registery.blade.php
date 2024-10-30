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
            <div class="card shadow-lg">
            <div class="card-header">Employer Registration</div>
            <form action="#" method="POST" id="registrationForm">
                @csrf
                 <div class="card-body">
                    <div class="form-group">
                        <label for="" >Company Name</label>
                        <input type="text" class="form-control" name="name" required>
                        @if ($errors->has('name'))
                         <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif

                    </div>
                    <div class="form-group">
                        <label for="" >Email</label>
                        <input type="text" class="form-control" name="email" required>
                        @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif

                    </div>
                    <div class="form-group">
                        <label for="" >Password</label>
                        <input type="text" class="form-control" name="password" required>
                        @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif

                    </div>
                    <br>
                    <div class="form-group">
                        <button class="btn btn-primary" id="btnRegister">Register</button>
                    </div>
                 </div>
            </form>
            </div>
        </div>
    </div>
  </div>

  <script>
    var url = '{{route('store.employer')}}';
    document.getElementById('btnRegister').addEventListner('click', function(event){
        var form = document.getElementById('registrationForm');
        var formData = new formData(form);
        var button = event.target;
        button.disabled = true;
    })
  </script>
@endsection
