@extends('dashboard.layouts.template')

@section('content')
<div class="container-fluid py-4">
    <div class="row my-4">
        <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-lg-6 col-7">
                            <h6>Data User</h6>
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
                                    <form method="POST" action="">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label" for="nik">NIK</label>
                                            <input type="text" name="nik" class="form-control" placeholder="NIK" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="name">Nama User</label>
                                            <input type="text" name="name" class="form-control" placeholder="Nama" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="place_of_birth">Tempat Lahir</label>
                                            <input type="text" name="place_of_birth" class="form-control" placeholder="Tempat Lahir" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="date_of_birth">Tanggal Lahir</label>
                                            <input type="date" name="date_of_birth" class="form-control" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Jenis Kelamin</label>
                                            <div>
                                                <input type="radio" id="laki-laki" name="gender" value="male" class="form-check-input" required>
                                                <label for="laki-laki" class="form-check-label">Laki-laki</label>
                                            </div>
                                            <div>
                                                <input type="radio" id="perempuan" name="gender" value="female" class="form-check-input" required>
                                                <label for="perempuan" class="form-check-label">Perempuan</label>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="religion">Agama</label>
                                            <select name="religion" class="form-select" required>
                                                <option value="">Pilih Agama</option>
                                                <option value="islam">Islam</option>
                                                <option value="christian">Kristen</option>
                                                <option value="catholic">Katolik</option>
                                                <option value="hindu">Hindu</option>
                                                <option value="buddha">Buddha</option>
                                                <option value="other">Kepercayaan Lain</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="address">Alamat</label>
                                            <input type="text" name="address" class="form-control" placeholder="Masukkan alamat lengkap Anda" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="phone">Nomor Telepon</label>
                                            <input type="text" name="phone" class="form-control" placeholder="Masukkan nomor telepon Anda" required>
                                        </div>

                                        <div class="text-center">
                                            <hr>
                                            <button class="btn btn-primary" type="submit">Simpan</button>
                                            <button class="btn btn-danger" type="reset">Kosongkan</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-body-secondary">
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
