@extends('dashboard.layouts.template')
@section('content')
<div class="container-fluid py-4">
    <div class="row my-4">
        <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-lg-6 col-7">
                            <h6>All Candidates</h6>
                        </div>
                        <div class="col-lg-7 col-5 text-right">
                            <a href="{{ route('candidates.create') }}" class="btn btn-sm btn-primary">Add Candidate</a>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0">
                    <div class="card text-center mt-1">
                        <table class="table table-dark table-hover p-2">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Party</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Photo</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($candidates as $candidate)
                                    <tr>
                                        <td>{{ $candidate->id }}</td>
                                        <td>{{ $candidate->name }}</td>
                                        <td>{{ $candidate->party->name }}</td>
                                        <td>{{ $candidate->category->name }}</td>
                                        <td>
                                          @if ($candidate->photo)
                                          <img src="{{ asset('assets/images/candidates/' . $candidate->photo) }}" alt="{{ $candidate->name }}" style="width: 50px; height: 50px;">
                                          @else
                                          <img src="{{ asset('assets/images/candidates/default.jpg') }}" alt="Default Image" style="width: 50px; height: 50px;">
                                          @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('candidates.show', $candidate->id) }}" class="btn btn-primary btn-sm">View</a>
                                            <a href="{{ route('candidates.edit', $candidate->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('candidates.destroy', $candidate->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer text-muted">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
