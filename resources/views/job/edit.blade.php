@extends('layout.admin.main')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Update a Job</h1>
                @if (Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif
                <form action="{{ route('job.update', [$listing->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="feature_image">Feature Image</label>
                        <input type="file" id="feature_image" class="form-control" name="feature_image">
                        @if ($errors->has('feature_image'))
                            <div class="errors">{{ $errors->first('feature_image') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input id="title" class="form-control" name="title" value="{{ $listing->title }}">
                        @if ($errors->has('title'))
                            <div class="errors">{{ $errors->first('title') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" class="form-control summernote" name="description">{{ $listing->description }}</textarea>
                        @if ($errors->has('description'))
                            <div class="errors">{{ $errors->first('description') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="roles">Roles and Responsibility</label>
                        <textarea id="roles" class="form-control summernote" name="roles">
                            {{ $listing->roles }}
                        </textarea>
                        @if ($errors->has('roles'))
                            <div class="errors">{{ $errors->first('roles') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Job Types</label>
                        <div class="form-check">
                            <input type="radio" name="job_type" value="Fulltime" id="job_type" class="form-check=input"
                                {{ $listing->job_type === 'Fulltime' ? 'checked' : null }}>
                            <label for="job_type" class="form-check-label">Fulltime</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="job_type" value="Parttime" id="Parttime" class="form-check=input"
                                {{ $listing->job_type === 'Parttime' ? 'checked' : null }}>
                            <label for="Parttime" class="form-check-label">Parttime</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="job_type" value="Casual" id="Casual" class="form-check=input"
                                {{ $listing->job_type === 'Casual' ? 'checked' : null }}>
                            <label for="Casual" class="form-check-label">Casual</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="job_type" value="Contract" id="Contract" class="form-check=input"
                                {{ $listing->job_type === 'Contract' ? 'checked' : null }}>
                            <label for="Contract" class="form-check-label">Contract</label>
                        </div>
                        @if ($errors->has('job_types'))
                            <div class="errors">{{ $errors->first('job_types') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input id="address" class="form-control" name="address" value="{{ $listing->address }}">
                        @if ($errors->has('address'))
                            <div class="errors">{{ $errors->first('address') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="salary">Salary</label>
                        <input id="salary" class="form-control" name="salary" value="{{ $listing->salary }}">
                        @if ($errors->has('salary'))
                            <div class="errors">{{ $errors->first('salary') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="date">Application Close Date</label>
                        <input id="datepicker" class="form-control" name="date"
                            value="{{ $listing->application_close_date }}">
                        @if ($errors->has('date'))
                            <div class="errors">{{ $errors->first('date') }}</div>
                        @endif
                    </div>
                    <div class="form-group mt-4">
                        <button class="btn btn-success" type="submit">Update a Job</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <style>
        .note-insert {
            display: none !important;
        }

        .errors {
            color: red;
            font-weight: bold
        }
    </style>
@endsection
