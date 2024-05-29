@extends('pages.layouts.template')
@section('content')
<div class="container">
  <br><br><br>
  <h2 class="mt-5 mb-3" style="color: black">Form Pemilihan Partai dan Pasangan Presiden</h2>
  <div class="row">
    <form action="{{route('votes.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="category_id">Pilih Category</label>
            <select class="form-control" name="candidate_id" id="candidate_id">

                <option value="">Pilih Kandidat</option>
                @foreach ($candidates as $candidate)
                <option value="{{$candidate->id}}">{{$candidate->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary my-3">Vote</button>
    </form>
  </div>
</div>

@endsection
