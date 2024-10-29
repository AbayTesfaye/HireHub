@extends('layout.app')
@section('content')
  <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
          @include('message')
            <div class="card">
            <div class="card-header">Login</div>
            <form action="{{route('postLogin')}}" method="POST">
                @csrf
                 <div class="card-body">
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
                    <div class="form-group text-center">
                        <button class="btn btn-primary" type="submit">Login</button>
                    </div>
                 </div>
            </form>
            </div>
        </div>
    </div>
  </div>
@endsection
