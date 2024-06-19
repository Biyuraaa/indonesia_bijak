@extends('dashboard.layouts.template')
@section('content')
<div class="container-fluid py-4">
    <div class="row my-4">
        <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-lg-6 col-7">
                            <h6>Add New Candidate</h6>
                        </div>
                        <div class="col-lg-7 col-5 text-right">
                            <a href="{{ route('candidates.index') }}" class="btn btn-sm btn-primary">Back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                  @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    
                  @endif
                    <form action="{{ route('candidates.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Candidate Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter candidate name" required>
                        </div>
                        <div class="form-group">
                            <label for="party_id">Party</label>
                            <select class="form-control" id="party_id" name="party_id" required>
                                <option value="">Select Party</option>
                                @foreach($parties as $party)
                                    <option value="{{ $party->id }}">{{ $party->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select class="form-control" id="category_id" name="category_id" required>
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="vision">Vision</label>
                            <textarea class="form-control" id="vision" name="vision" rows="3" placeholder="Enter candidate vision" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="mission">Mission</label>
                            <textarea class="form-control" id="mission" name="mission" rows="3" placeholder="Enter candidate mission" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="photo">Photo</label>
                            <input type="file" class="form-control-file" id="photo" name="photo" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Candidate</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
