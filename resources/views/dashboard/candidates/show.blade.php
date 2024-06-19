@extends('dashboard.layouts.template')
@section('content')
<div class="container-fluid py-4">
    <div class="row my-4">
        <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-lg-6 col-7">
                            <h6>Candidate Details</h6>
                        </div>
                        <div class="col-lg-7 col-5 text-right">
                            <a href="{{ route('candidates.index') }}" class="btn btn-sm btn-primary">Back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="">
                      @if ($candidate->photo)
                      <img src="{{ asset('assets/images/candidates/' . $candidate->photo) }}" alt="{{ $candidate->name }}" style="width: 300px; height: 300px;">
                      @else
                      <img src="{{ asset('assets/images/candidates/default.jpg') }}" alt="Default Image" style="width: 300px; height: 300px;">
                      @endif
                        <h3 class="mt-3">{{ $candidate->name }}</h3>
                        <h5>Party: {{ $candidate->party->name }}</h5>
                        <h5>Category: {{ $candidate->category->name }}</h5>
                        <p><strong>Vision:</strong> {{ $candidate->vision }}</p>
                        <p><strong>Mission:</strong> {{ $candidate->mission }}</p>
                    </div>
                    <hr>
                    <div class="mt-4">
                        <h4>Prestations</h4>
                        <ul class="list-group">
                            @foreach($candidate->prestations as $prestation)
                                <li class="list-group-item">
                                    <h5>{{ $prestation->name }}</h5>
                                    <p>{{ $prestation->description }}</p>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
