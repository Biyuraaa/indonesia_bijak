@extends('pages.layouts.template')
@section('content')
<section class="kandidat" id="Kandidat">
    <div class="container">
        <br>
        <h2 class="text-center mb-4">{{ $blog->title }}</h2>
        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="card">
                    @if($blog->image)
                    <img src="{{ asset('assets/images/blogs/' . $blog->image) }}" class="card-img-top" alt="{{ $blog->title }}">
                    @else
                    <img src="{{ asset('assets/images/blogs/default.jpg') }}" class="card-img-top" alt="Default Image">
                    @endif
                    <div class="card-body">
                        <p class="card-text">{{ $blog->content }}</p>
                    </div>
                    <div class="card-footer text-muted">
                        Posted by {{ $blog->user->name }} on {{ $blog->created_at->format('d M Y') }}
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-12">
                <h4>Comments</h4>
                @foreach($blog->comments as $comment)
                <div class="d-flex mb-4" style="border: 1px solid #ccc; padding: 10px; border-radius: 10px;">
                    <div class="mr-3">
                        @if($comment->user->photo)
                        <img class="rounded-circle" src="{{ asset('assets/images/users/' . $comment->user->photo) }}" alt="{{ $comment->user->name }}" style="width: 64px; height: 64px;">
                        @else
                        <img class="rounded-circle" src="{{ asset('assets/images/users/default.png') }}" alt="Default Image" style="width: 64px; height: 64px;">
                        @endif
                    </div>
                    <div class="  ">
                        <div class="d-flex justify-content-around align-items-center">
                            <h5 class="mt-0 text-black">{{ $comment->user->name }}</h5>
                            <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                        </div>
                        <p class="text-black">{{ $comment->content }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-12">
                <h4>Leave a Comment</h4>
                <form action="{{ route('comments.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                    <div class="form-group">
                        <textarea class="form-control" name="content" rows="3" placeholder="Write your comment here..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Comment</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
