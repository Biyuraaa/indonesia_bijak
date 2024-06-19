@extends('dashboard.layouts.template')
@section('content')
<div class="container-fluid py-4">
    <div class="row my-4">
        <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-lg-6 col-7">
                            <h6>User Details</h6>
                        </div>
                      </div>
                    </div>
                  <div class="card-body px-0 pb-2">
                    <div class="card text-center mt-3">
                        <div class="card-header">
                            <h4>{{ $user->name }}</h4>
                        </div>
                        <div class="card-body">
                            <p><strong>NIK:</strong> {{ $user->nik }}</p>
                            <p><strong>Email:</strong> {{ $user->email }}</p>
                            <p><strong>Role:</strong> {{ $user->role }}</p>
                            <p><strong>Address:</strong> {{ $user->address }}</p>
                            <p><strong>Phone:</strong> {{ $user->phone }}</p>
                            <p><strong>Place of Birth:</strong> {{ $user->place_of_birth }}</p>
                            <p><strong>Date of Birth:</strong> {{ $user->date_of_birth ? $user->date_of_birth : 'N/A' }}</p>
                            <p><strong>Gender:</strong> {{ $user->gender }}</p>
                            <p><strong>Religion:</strong> {{ $user->religion }}</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('users.index', $user) }}" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-lg-6 col-7">
                            <h6>User Votes</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="card text-center mt-3">
                        @if($votes->isEmpty())
                            <p class="text-center">No votes found.</p>
                        @else
                            <table class="table table-dark table-hover p-2">
                                <thead>
                                    <tr>
                                        <th scope="col">Category</th>
                                        <th scope="col">Candidate</th>
                                        <th scope="col">Voted At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($votes as $vote)
                                        <tr>
                                            <td>{{ $vote->category->name }}</td>
                                            <td>{{ $vote->candidate->name }}</td>
                                            <td>{{ $vote->voted_at }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                    <div class="card-footer text-muted">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
