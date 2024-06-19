@extends('dashboard.layouts.template')

@section('content')
<div class="container-fluid py-4">
    <div class="row my-4">
        <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-lg-6 col-7">
                            <h6>My Profile</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="row">
                        <div class="col-md-8 mx-auto">
                            <div class="card">
                                <div class="card-header text-center">
                                    Profile Details
                                  </div>
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
                                            <th>Tempat Lahir</th>
                                            <td>{{ Auth::user()->place_of_birth }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal Lahir</th>
                                            <td>{{ Auth::user()->date_of_birth }}</td>
                                        </tr>
                                        <tr>
                                            <th>Jenis Kelamin</th>
                                            <td>{{ Auth::user()->gender == 'male' ? 'Laki-laki' : (Auth::user()->gender == 'female' ? 'Perempuan' : '-') }}
                                            </td>                                        
                                        </tr>
                                        <tr>
                                            <th>Agama</th>
                                            <td>
                                                @switch(Auth::user()->religion)
                                                    @case('islam')
                                                        Islam
                                                        @break
                                                    @case('christian')
                                                        Kristen
                                                        @break
                                                    @case('catholic')
                                                        Katolik
                                                        @break
                                                    @case('hindu')
                                                        Hindu
                                                        @break
                                                    @case('buddha')
                                                        Buddha
                                                        @break
                                                    @case('other')
                                                        Kepercayaan Lain
                                                        @break
                                                @endswitch
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Alamat</th>
                                            <td>{{ Auth::user()->address }}</td>
                                        </tr>
                                        <tr>
                                            <th>Nomor Telepon</th>
                                            <td>{{ Auth::user()->phone }}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="card-footer text-body-secondary text-center">
                                    <a href="{{ route('profiles.edit', Auth::user()->id) }}" class="btn btn-primary">Edit Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
