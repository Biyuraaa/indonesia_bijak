@extends('dashboard.layouts.template')
@section('content')
<div class="container-fluid py-4">
    <div class="row my-4">
        <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-lg-6 col-7">
                            <h6>All Parties</h6>
                        </div>
                        <div class="col-lg-12 col-5 text-right">
                            <a href="{{ route('parties.create') }}" class="btn btn-sm btn-primary">Add Party</a>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="row">
                        @foreach ($parties as $party)
                            <div class="col-md-4 mb-4">
                                <div class="card text-center h-100">
                                  @if ($party->logo)
                                  <img src="{{ asset('assets/images/parties/' . $party->logo) }}" class="card-img-top" alt="{{ $party->name }}">
                                  @else
                                  <img src="{{ asset('assets/images/parties/default.png') }}" class="card-img-top" alt="Default Image">
                                  @endif
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $party->name }}</h5>
                                        <p class="card-text">{{ \Illuminate\Support\Str::limit($party->history, 100) }}</p>
                                    </div>
                                    <div class="card-footer">
                                        <a href="{{ route('parties.show', $party) }}" class="btn btn-primary">View</a>
                                        <a href="{{ route('parties.edit', $party) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('parties.destroy', $party) }}" method="POST" style="display: inline-block; margin-left: 5px;" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="card-footer text-muted">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
