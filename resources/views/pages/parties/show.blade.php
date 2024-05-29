@extends('pages.layouts.template')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-12 col-md-12 mb-4">
            <div class="card">
                <div class="card-header">
                    <h3>{{ $party->name }}</h3>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4"><strong>Logo:</strong></div>
                        <div class="col-md-8">
                            @if ($party->logo)
                                {{-- <img src="{{ asset('assets/images/' . $party->logo) }}" alt="Party Logo" class="img-fluid rounded"> --}}
                                <img src="{{ asset($party->logo) }}" alt="Party Logo" class="img-fluid rounded">
                            @else
                                <img src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="Default Image" class="img-fluid rounded">
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4"><strong>History:</strong></div>
                        <div class="col-md-8">{{ $party->history }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4"><strong>Vision:</strong></div>
                        <div class="col-md-8">{{ $party->vision }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4"><strong>Mission:</strong></div>
                        <div class="col-md-8">{{ $party->mission }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4"><strong>Candidates:</strong></div>
                        <div class="col-md-8">
                            <ul>
                                @foreach($party->candidates as $candidate)
                                    <li>{{ $candidate->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4"><strong>Programs:</strong></div>
                        <div class="col-md-8">
                            <ul>
                                @foreach($party->programs as $program)
                                    <li><strong>{{ $program->title }}</strong>: {{ $program->description }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- Add more fields as needed -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
