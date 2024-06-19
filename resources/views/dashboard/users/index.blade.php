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
                        <div class="card text-center mt-3">
                                <table class="table table-dark table-hover p-2">
                                    <thead>
                                        <tr>
                                            <th scope="col">NIK</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Role</th>
                                            <th scope="col">Alamat</th>
                                            <th scope="col">Nomor Telepon</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($users as $user)

                                            <tr>
                                                <td>
                                                    {{$user->nik}}
                                                </td>
                                                <td>
                                                    {{$user->name}}
                                                </td>
                                                <td>
                                                    {{$user->role}}
                                                </td>
                                                <td>
                                                    {{$user->address}}
                                                </td>

                                                <td>
                                                    {{$user->phone}}
                                                    </td>
                                                      <td>
                                                          <a href="{{route('users.show', $user)}}" class="btn btn-primary">View</a>
                                                          <a href="{{route('users.edit', $user)}}" class="btn btn-warning">Edit</a>
                                                          <form action="{{route('users.destroy', $user)}}" method="POST" style="display: inline-block; margin-left: 5px;"
                                                          onsubmit="return confirm('Are you sure?');"
                                                          >
                                                              @csrf
                                                              @method('DELETE')
                                                              <button type="submit" class="btn btn-danger">Hapus</button>
                                                          </form>
                                                      </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                </table>
                            </div>
                            <div class="card-footer text-muted">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection