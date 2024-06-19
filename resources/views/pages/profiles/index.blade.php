@extends('pages.layouts.template')
@section('content')
<section class="kandidat" id="partai">
  <div class="container">
    <h2 class="text-center mb-4">My Profile</h2>
    <div class="row">
      <div class="col-md-8 mx-auto">
        <div class="card">
          <div class="card-body text-center">
            @if (Auth::user()->photo)
            <img class="img-account-profile rounded-circle mb-2 max-w-6"
              src="{{ asset('assets/images/users/' . Auth::user()->photo) }}" alt>
            @else
            <img class="img-account-profile rounded-circle mb-2 max-w-6"
              src="{{asset('assets/images/users/default.png')}}" alt>
            @endif
          </div>
          <div class="card-body">
            <table class="table">
              <tr>
                <th>NIK</th>
                <td>{{ Auth::user()->nik }}</td>
              </tr>
              <tr>
                <th>Nama User</th>
                <td>{{ Auth::user()->name }}</td>
              </tr>
              <tr>
                <th>Tanggal Lahir</th>
                <td>{{ Auth::user()->date_of_birth }}</td>
              </tr>
              <tr>
                <th>Jenis Kelamin</th>
                <td class="text-capitalize">{{ Auth::user()->gender }}</td>
              </tr>
              <tr>
                <th>Agama</th>
                <td class="text-capitalize">{{ Auth::user()->religion }}</td>
              </tr>
              <tr>
                <th>Alamat</th>
                <td>{{ Auth::user()->address }}</td>
              </tr>
              <tr>
                <th>Email</th>
                <td>{{ Auth::user()->email }}</td>
              </tr>
              <tr>
                <th>No. HP</th>
                <td>{{ Auth::user()->phone }}</td>
              </tr>
            </table>
            <a href="{{ route('profiles.edit', Auth::user()) }}" class="btn btn-primary">Edit Profile</a>
          </div>
        </div>
  </div>
</section>
@endsection