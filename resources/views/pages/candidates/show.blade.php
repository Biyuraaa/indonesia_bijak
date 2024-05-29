@extends('pages.layouts.template')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-12 col-md-12 mb-4">
            <div class="card">
                <div class="card-header">
                    <h3>{{ $candidate->name }}</h3>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4"><strong>Party:</strong></div>
                        <div class="col-md-8">{{ $candidate->party->name }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4"><strong>Category:</strong></div>
                        <div class="col-md-8">{{ $candidate->category->name }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4"><strong>Election:</strong></div>
                        <div class="col-md-8">{{ $candidate->election->name }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4"><strong>Vision:</strong></div>
                        <div class="col-md-8">{{ $candidate->vision }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4"><strong>Mission:</strong></div>
                        <div class="col-md-8">{{ $candidate->mission }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4"><strong>Photo:</strong></div>
                        <div class="col-md-8">
                            @if ($candidate->photo)
                            {{-- <img src="{{ asset('assets/images/' . $candidate->photo) }}" alt="Candidate Photo" class="img-fluid rounded"> --}}
                            <img src="{{ asset($candidate->photo) }}" alt="Candidate Photo" class="img-fluid rounded">
                            @else
                            <img src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="Default Image" class="img-fluid rounded">
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4"><strong>Programs:</strong></div>
                        <div class="col-md-8">
                            <ul>
                                @foreach($candidate->prestations as $prestation)
                                <li><strong>{{ $prestation->name }}</strong>: {{ $prestation->description }}</li>
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
