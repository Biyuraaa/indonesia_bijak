@extends('dashboard.layouts.template')
@section('content')
<div class="container-fluid py-4">
    <div class="row my-4">
        <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-lg-6 col-7">
                            <h6>Edit Candidate</h6>
                        </div>
                        <div class="col-lg-7 col-5 text-right">
                            <a href="{{ route('candidates.index') }}" class="btn btn-sm btn-primary">Back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body px-4 pt-0 pb-2">
                    <form action="{{ route('candidates.update', $candidate) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ $candidate->name }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="party_id" class="form-label">Party</label>
                            <select name="party_id" class="form-control" id="party_id" required>
                                @foreach($parties as $party)
                                    <option value="{{ $party->id }}" {{ $candidate->party_id == $party->id ? 'selected' : '' }}>
                                        {{ $party->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category</label>
                            <select name="category_id" class="form-control" id="category_id" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $candidate->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="vision" class="form-label">Vision</label>
                            <textarea name="vision" class="form-control" id="vision" rows="3" required>{{ $candidate->vision }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="mission" class="form-label">Mission</label>
                            <textarea name="mission" class="form-control" id="mission" rows="3" required>{{ $candidate->mission }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="photo" class="form-label">Photo</label>
                            <input type="file" name="photo" class="form-control" id="photo">
                            <small>Current Photo:</small><br>
                            <img src="{{ asset('assets/images/candidates/' . $candidate->photo) }}" alt="{{ $candidate->name }}" class="img-thumbnail" style="width: 150px; height: 150px;">
                        </div>

                        <button type="submit" class="btn btn-primary">Update Candidate</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
