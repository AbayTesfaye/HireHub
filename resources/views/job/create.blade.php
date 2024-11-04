@extends('layout.admin.main')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Post a Job</h1>
                <form action="" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input id="title" class="form-control" name="title">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" class="form-control" name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="roles">Roles and Responsibility</label>
                        <textarea id="roles" class="form-control" name="roles"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Job Types</label>
                        <div class="form-check">
                            <input type="radio" name="job_type" value="Fulltime" id="job_type" class="form-check=input">
                            <label for="job_type" class="form-check-label">Fulltime</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="job_type" value="Parttime" id="Parttime" class="form-check=input">
                            <label for="Parttime" class="form-check-label">Parttime</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="job_type" value="Casual" id="Casual" class="form-check=input">
                            <label for="Casual" class="form-check-label">Casual</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="job_type" value="Contract" id="Contract" class="form-check=input">
                            <label for="Contract" class="form-check-label">Contract</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input id="address" class="form-control" name="address">
                    </div>
                    <div class="form-group">
                        <label for="date">Application Close Date</label>
                        <input type="date" id="date" class="form-control" name="date">
                    </div>
                    <div class="form-group mt-4">
                        <button class="btn btn-success" type="submit">Post a Job</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
