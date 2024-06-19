@extends('dashboard.layouts.template')
@section('content')
<div class="container-fluid py-4">
    <div class="row my-4">
        <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-lg-6 col-7">
                            <h6>Edit User</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="p-2 mt-3">
                      @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        
                      @endif
                        <form action="{{ route('users.update', $user) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="text" class="form-control" id="nik" name="nik" value="{{ $user->nik }}" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="photo">Photo</label>
                                <input type="file" class="form-control" id="photo" name="photo">
                                @if($user->photo)
                                    <img src="{{ asset('assets/images/users/' . $user->photo) }}" alt="User Photo" style="width: 100px; height: 100px; margin-top: 10px;">
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="role">Role</label>
                                <select class="form-control" id="role" name="role" required>
                                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="voter" {{ $user->role == 'voter' ? 'selected' : '' }}>Voter</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="place_of_birth">Tempat Lahir</label>
                                <input type="text" class="form-control" id="place_of_birth" name="place_of_birth" value="{{ $user->place_of_birth }}">
                            </div>
                            <div class="form-group">
                                <label for="date_of_birth">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ $user->date_of_birth }}">
                            </div>
                            <div class="form-group">
                                <label for="gender">Jenis Kelamin</label>
                                <select class="form-control" id="gender" name="gender">
                                    <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="religion">Agama</label>
                                <select class="form-control" id="religion" name="religion">
                                    <option value="islam" {{ $user->religion == 'islam' ? 'selected' : '' }}>Islam</option>
                                    <option value="christian" {{ $user->religion == 'christian' ? 'selected' : '' }}>Kristen</option>
                                    <option value="catholic" {{ $user->religion == 'catholic' ? 'selected' : '' }}>Katolik</option>
                                    <option value="hindu" {{ $user->religion == 'hindu' ? 'selected' : '' }}>Hindu</option>
                                    <option value="buddha" {{ $user->religion == 'buddha' ? 'selected' : '' }}>Buddha</option>
                                    <option value="confucian" {{ $user->religion == 'confucian' ? 'selected' : '' }}>Konghucu</option>
                                    <option value="other" {{ $user->religion == 'other' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="address">Alamat</label>
                                <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}">
                            </div>
                            <div class="form-group">
                                <label for="phone">Nomor Telepon</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Update User</button>
                            <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                    <div class="card-footer text-muted">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
