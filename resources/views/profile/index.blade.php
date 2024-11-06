@extends('layout.admin.main')
@section('content')
    <div class="container mt-s">
        <div class="col-md-8 justify-content-center">
            <form action="{{ route('user.update.profile') }}" method="POST">
                <div class="form-group mt-4">
                    <label for="logo">Logo</label>
                    <input type="file" name="profile_pic" id="logo" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Company Name</label>
                    <input name="name" id="name" class="form-control">
                </div>
                <div class="form-group mt-4">
                    <button class="btn btn-success" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
