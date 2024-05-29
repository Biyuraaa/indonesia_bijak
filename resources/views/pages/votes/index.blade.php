@extends('pages.layouts.template')
@section('content')
<div class="container">
  <br><br><br>
  <h2 class="mt-5 mb-3">Pilih Category</h2>
  <div class="row">
    @foreach($categories as $category)
    <div class="col-md-4">
      <div class="card mb-4">
        @if ($category->image == null)
          <img class="card-img-top" src="https://via.placeholder.com/150" alt="{{ $category->name }}"> 
        @else
          <img class="card-img-top" src="{{ $category->image }}" alt="{{ $category->name }}">
          
        @endif
        <div class="card-body">
          <h5 class="card-title">{{ $category->name }}</h5>
          <a href="{{route('votes.show', $category)}}" class="btn btn-primary">Vote</a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection