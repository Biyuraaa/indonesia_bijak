@extends('pages.layouts.template')
@section('content')
    <section class="kandidat" id="Kandidat">
        <div class="container">
            <br><br><br>
            <h2 class="text-center mb-4">Kandidat Presiden dan Wakil Presiden</h2>
            <div class="row">
              @foreach ($candidates as $candidate)
              <div class="col-md-4 mb-4">
                    <div class="card shadow">
                        @if ($candidate->photo)
                        {{-- <img src="{{asset('assets/images' . $candidate->photo)}}" class="card-img-top" alt="{{$candidate->name}}" --}}
                        <img src="{{asset($candidate->photo)}}" class="card-img-top" alt="{{$candidate->name}}"
                            style="width: 100%; height: 170px;">
                        @else
                        <img src="{{asset('assets/images/Anies.jpg')}}" class="card-img-top" alt="Anies Baswedan"
                            style="width: 100%; height: 170px;">
                        @endif
                        <div class="card-body text-center">
                            <h5 class="card-title">{{$candidate->name}}</h5>
                            <a class="learn-more" href="{{route('candidate', ['candidate' => $candidate])}}">Pelajari Selengkapnya →</a>
                        </div>
                    </div>
                </div>
              @endforeach
            </div>
        </div>
    </section>

@endsection