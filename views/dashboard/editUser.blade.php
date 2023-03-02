@extends('dashboard.layouts.main')
@section('container')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success mb-3 col-lg-10" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="card row pt-3 pe-2">
            <div class="card-body p-1">
                <h2 style="text-align: center">Edit User</h2>
            </div>
            <div class="row card-body">
                <form action="/dashboard/updateUser/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-12 text-center justify-content-center">
                        <label for="avatar" class="mb-5 justify-content-center"
                            style="cursor: pointer; position: relative">
                            <input type="file" accept="image/*" class="d-none" id="avatar" name="avatar"
                                accept=".png, .jpg, .jpeg" onchange="previewImage()">
                            <span class="btn bg-white shadow" style="position: absolute; top: -10px; right: -10px">
                                <i class="fa fa-pencil"></i>
                            </span>
                            @if (isset($user->avatar))
                                <img src="{{ asset('storage/' . $user->avatar) }}" width="100px" alt="">
                            @else
                            @endif
                            {{-- <img width="100px"
                            src="{{ isset(@$user->avatar) ? asset('avatar/' . @$user->avatar) : asset('/assets/media/svg/avatars/blank.svg') }}"
                            class="rounded" id="avatar-preview" alt="image"> --}}
                        </label>
                    </div>


                    <div class="row mb-2 justify-content-center text-center">
                        <label class="col-lg-4 required form-label">Nama Lengkap :</label>
                        <div class="col-lg-8">
                            <input type="text" placeholder="Name" name="nm_lengkap" class="form-control 2"
                                value="{{ $user->nm_lengkap }}">
                        </div>
                    </div>

                    <div class="row mb-2 justify-content-center text-center">
                        <label class="col-lg-4 required form-label">Nama User:</label>
                        <div class="col-lg-8">
                            <input type="text" placeholder="Name" name="nm_user" class="form-control 2"
                                value="{{ $user->nm_user }}">
                        </div>
                    </div>

                    <div class="row mb-2 justify-content-center text-center">
                        <label class="col-lg-4 required form-label">Email :</label>
                        <div class="col-lg-8">
                            <input type="text" placeholder="Email" name="email" class="form-control 2"
                                value="{{ $user->email }}">
                        </div>
                    </div>

                    <div class="row mb-2 justify-content-center text-center">
                        <label class="col-lg-4 required form-label">Password :</label>
                        <div class="col-lg-8">
                            <div class="input-group">
                                <input type="password" placeholder="Password" name="password" id="password"
                                    class="form-control">
                                <button class="btn btn-outline-secondary mb-0" type="button" id="show-password"><i
                                        class="fa fa-eye"></i></button>
                            </div>
                            @error('password')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-2 justify-content-center text-center">
                        <label class="col-lg-4 required form-label">Nomer Telepon :</label>
                        <div class="col-lg-8">
                            <input type="text" placeholder="No Telp" name="no_telepon" class="form-control 2"
                                value="{{ @$user->no_telepon }}">
                        </div>
                    </div>
                    @error('no_telepon')
                        {{ $message }}
                    @enderror

                    <div class="row mb-2 justify-content-center text-center">
                        <label class="col-lg-4 required form-label">Alamat :</label>
                        <div class="col-lg-8">
                            <input type="text" name="alamat" class="form-control 2" value="{{ @$user->alamat }}">
                        </div>
                    </div>
                    @error('alamat')
                        {{ $message }}
                    @enderror

            </div>
            <div class="form-action text-right">
                <button type="submit" class="btn btn-info btn-large 2">Simpan</button>
                <a href="/dashboard/user" type="button" class="btn btn-danger btn-large 2 me-2">
                    </i> Batal
                </a>
            </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        document.getElementById('show-password').addEventListener('click', (e) => {
            const input = document.getElementById('password');
            if (input.type == 'password') {
                input.type = 'text'
            } else {
                input.type = 'password'
            };
        });
    </script>
@endsection
