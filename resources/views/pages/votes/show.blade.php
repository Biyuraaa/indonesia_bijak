@extends('pages.layouts.template')
@section('content')
<div class="container">
  <br><br><br>
  <h2 class="mt-5 mb-3" style="color: black">Form Pemilihan {{$category->name}}</h2>
  <div class="row">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    <form action="{{ route('votes.store') }}" method="POST">
        @csrf
        <input type="hidden" name="category_id" value="{{$category->id}}">
        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
        <input type="hidden" name="voted_at" value="{{now()}}">

        <div class="form-group">
            <select class="form-control" name="candidate_id" id="candidate_id">
                <option value="">Pilih Kandidat</option>
                @foreach ($candidates as $candidate)
                    <option value="{{ $candidate->id }}" data-category-id="{{ $candidate->category_id }}">{{ $candidate->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary my-3">Vote</button>
    </form>
  </div>
</div>
@endsection
