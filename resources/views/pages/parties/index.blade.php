@extends('pages.layouts.template')
@section('content')
<section class="kandidat" id="partai">
  <div class="container">
    <br><br><br>
    <h2 class="text-center mb-4">Kandidat Partai</h2>
    <div class="row">
    @foreach ($parties as $party)
      <div class="col-md-4 mb-4">
        <div class="card shadow">
          @if ($party->logo)
            {{-- <img src="{{asset('assets/images/' . $party->logo)}}" class="card-img-top" alt="{{$party->name}}"> --}}
            <img src="{{asset($party->logo)}}" class="card-img-top" alt="{{$party->name}}">
          @else
            <img src="{{asset('assets/images/pdip.jpg')}}" class="card-img-top" alt="pdip">
          @endif
            <div class="card-body text-center">
                <h5 class="card-title">{{$party->name}}</h5>
                <a class="learn-more" href="{{route('party', ['party' => $party])}}">Pelajari Selengkapnya →</a>
            </div>
        </div>
    </div>
    @endforeach
    </div>
  </div>
</section>
@endsection