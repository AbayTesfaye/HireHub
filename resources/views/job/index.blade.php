@extends('layout.admin.main')
@section('content')
    <div class="container mt-s">
        <div class="col-md-8 justify-content-center">
            <h1>All Jobs</h1>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Your Jobs
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Created on</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Title</th>
                                <th>Created on</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($jobs as $job)
                                <tr>
                                    <td>{{ $job->title }}</td>
                                    <td>{{ $job->created_at->format('Y-m-d') }}</td>
                                    <td><a href="{{ route('job.edit', [$job->id]) }}">Edit</a></td>
                                    <td><a href="#" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal-{{ $job->id }}">Delete</a></td>
                                </tr>
                                <!-- Modal -->
                                <form action="{{ route('job.delete') }}" method="POST">@csrf
                                    @method('DELETE')
                                    <div class="modal fade" id="deleteModal-{{ $job->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete this job ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
