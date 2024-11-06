@extends('layout.app')
@section('content')
    <div class="container mt-s">
        <div class="col-md-8 justify-content-center mt-5">
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            <form action="{{ route('user.update.profile') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="image">Profile Image</label>
                    <input type="file" name="profile_pic" id="image" class="form-control">
                    @if (Auth::user()->profile_pic)
                        <img src="{{ Storage::url(auth()->user()->profile_pic) }}" alt="userProfile" width="150"
                            class="mt-3">
                    @endif
                </div>
                <div class="form-group">
                    <label for="name">Your Name</label>
                    <input name="name" id="name" class="form-control" value="{{ auth()->user()->name }}">
                </div>
                <div class="form-group mt-4">
                    <button class="btn btn-success" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
