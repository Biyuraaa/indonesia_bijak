@extends('dashboard.layouts.template')

@section('content')
<div class="container-fluid py-4">
    <div class="row my-4">
        <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-lg-6 col-7">
                            <h6>Edit Profile</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="row">
                        <div class="col-md-8 mx-auto">
                            <div class="card">
                                <div class="card-header text-center">
                                    Input Data
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('profiles.update', Auth::user()->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="card-body text-center">
                                            @if (Auth::user()->photo)
                                            <img id="profile-image" class="img-account-profile rounded-circle mb-2 max-w-6"
                                                src="{{ asset('assets/images/users/' . Auth::user()->photo) }}" alt="Profile Image">
                                            @else
                                            <img id="profile-image" class="img-account-profile rounded-circle mb-2 max-w-6"
                                                src="{{asset('assets/images/users/default.png')}}" alt="Profile Image">
                                            @endif
                                            <input type="file" id="photo" name="photo" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">NIK</label>
                                            <input type="text" name="nik" value="{{ Auth::user()->nik }}" class="form-control" placeholder="NIK">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control" placeholder="Email">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Nama User</label>
                                            <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control" placeholder="Nama">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Tempat Lahir</label>
                                            <input type="text" name="place_of_birth" value="{{ Auth::user()->place_of_birth }}" class="form-control" placeholder="Tempat Lahir">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Tanggal Lahir</label>
                                            <input type="date" name="date_of_birth" value="{{ Auth::user()->date_of_birth }}" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Jenis Kelamin</label>
                                            <div>
                                                <input type="radio" id="laki-laki" name="gender" value="male" class="form-check-input" @if (Auth::user()->gender == 'male') checked @endif>
                                                <label for="laki-laki" class="form-check-label">Laki-laki</label>
                                            </div>
                                            <div>
                                                <input type="radio" id="perempuan" name="gender" value="female" class="form-check-input" @if (Auth::user()->gender == 'female') checked @endif>
                                                <label for="perempuan" class="form-check-label">Perempuan</label>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Agama</label>
                                            <select name="religion" class="form-select">
                                                <option value="">Pilih Agama</option>
                                                <option value="islam" {{ Auth::user()->religion == 'islam' ? 'selected' : '' }}>Islam</option>
                                                <option value="christian" {{ Auth::user()->religion == 'christian' ? 'selected' : '' }}>Kristen</option>
                                                <option value="catholic" {{ Auth::user()->religion == 'catholic' ? 'selected' : '' }}>Katolik</option>
                                                <option value="hindu" {{ Auth::user()->religion == 'hindu' ? 'selected' : '' }}>Hindu</option>
                                                <option value="buddha" {{ Auth::user()->religion == 'buddha' ? 'selected' : '' }}>Buddha</option>
                                                <option value="other" {{ Auth::user()->religion == 'other' ? 'selected' : '' }}>Kepercayaan Lain</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Alamat</label>
                                            <input type="text" name="address" value="{{ Auth::user()->address }}" class="form-control" placeholder="Masukkan alamat lengkap Anda">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Nomor Telepon</label>
                                            <input type="tel" name="phone" value="{{ Auth::user()->phone }}" class="form-control" placeholder="Masukkan nomor telepon Anda">
                                        </div>
                                        <div class="text-center">
                                            <hr>
                                            <button class="btn btn-primary" name="save" type="submit">Simpan</button>
                                            <button class="btn btn-danger" name="reset" type="reset">Kosongkan</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-body-secondary"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
                $('#profile-image').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

    $("#photo").change(function() {
        readURL(this);
    });
</script>
@endsection
