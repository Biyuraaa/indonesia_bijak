@extends('dashboard.layouts.template')
@section('content')
<div class="container-fluid py-4">
    <div class="row my-4">
        <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-lg-6 col-7">
                            <h6>Blog Details</h6>
                        </div>
                        <div class="col-lg-12 col-5 text-right">
                            <a href="{{ route('blogs.index') }}" class="btn btn-sm btn-primary">Back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $blog->title }}</h5>
                                    <p class="card-text">{{ $blog->content }}</p>
                                    @if($blog->image)
                                    <img src="{{ asset('assets/images/blogs/' . $blog->image) }}" alt="{{ $blog->title }}" class="img-fluid mb-3">
                                    @endif
                                    <p class="card-text"><small class="text-muted">Posted by {{ $blog->user->name }} on {{ $blog->created_at->format('d M Y') }}</small></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <h6>Comments</h6>
                            @forelse($blog->comments as $comment)
                            <div class="card mb-3">
                                <div class="card-body">
                                    <p class="card-text">{{ $comment->content }}</p>
                                    <p class="card-text"><small class="text-muted">Commented by {{ $comment->user->name }} on {{ $comment->created_at->format('d M Y') }}</small></p>
                                </div>
                            </div>
                            @empty
                            <p>No comments yet.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
