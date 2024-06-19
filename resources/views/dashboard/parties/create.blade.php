@extends('dashboard.layouts.template')
@section('content')
<div class="container-fluid py-4">
    <div class="row my-4">
        <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-lg-6 col-7">
                            <h6>Add New Party</h6>
                        </div>
                        <div class="col-lg-6 col-5 text-right">
                            <a href="{{ route('parties.index') }}" class="btn btn-sm btn-primary">Back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('parties.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="logo">Logo</label>
                            <input type="file" class="form-control" id="logo" name="logo" required>
                        </div>
                        <div class="form-group">
                            <label for="history">History</label>
                            <textarea class="form-control" id="history" name="history" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="vision">Vision</label>
                            <textarea class="form-control" id="vision" name="vision" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="mission">Mission</label>
                            <textarea class="form-control" id="mission" name="mission" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Add Party</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
