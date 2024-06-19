@extends('pages.layouts.template')
@section('content')
<section class="kandidat" id="Kandidat">
    <div class="container">
        <br>
        <h2 class="text-center mb-4">All Blogs</h2>
        <div class="row">
            @foreach ($blogs as $blog)
            <div class="col-md-12 mb-4">
                <div class="card h-100">
                    @if($blog->image)
                    <img src="{{ asset('assets/images/blogs/' . $blog->image) }}" class="card-img-top" alt="{{ $blog->title }}">
                    @else
                    <img src="{{ asset('assets/images/blogs/default.jpg') }}" class="card-img-top" alt="Default Image">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $blog->title }}</h5>
                        <p class="card-text">{{ Str::limit($blog->content, 100) }}</p>
                        <a href="{{ route('blogs.show', $blog) }}" class="btn btn-primary">Read More</a>
                    </div>
                    <div class="card-footer text-muted">
                        Posted by {{ $blog->user->name }} on {{ $blog->created_at->format('d M Y') }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
