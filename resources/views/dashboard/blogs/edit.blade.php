@extends('dashboard.layouts.template')
@section('content')
<div class="container-fluid py-4">
    <div class="row my-4">
        <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-lg-6 col-7">
                            <h6>Edit Blog</h6>
                        </div>
                        <div class="col-lg-12 col-5 text-right">
                            <a href="{{ route('blogs.index') }}" class="btn btn-sm btn-primary">Back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body px-4 pb-2">
                    <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Enter blog title" value="{{ $blog->title }}" required>
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea name="content" class="form-control" id="content" rows="5" placeholder="Enter blog content" required>{{ $blog->content }}</textarea>
                        </div>
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <div class="form-group">
                            <label for="image">Image</label>
                            @if($blog->image)
                            <div class="mb-2">
                                <img src="{{ asset('assets/images/blogs/' . $blog->image) }}" alt="{{ $blog->title }}" class="img-thumbnail" style="width: 200px;">
                            </div>
                            @endif
                            <input type="file" name="image" class="form-control-file" id="image">
                        </div>
                        <button type="submit" class="btn btn-primary">Update Blog</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
