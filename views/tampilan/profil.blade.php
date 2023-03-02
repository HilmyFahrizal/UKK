{{-- @dd($user) --}}
@extends('tampilan.layouts.index')
@section('container')
    <div class="container" style="margin-top: 130px">
        <section class="checkout_area section_gap mt-5">
            <div class="container">
                @if (session('success'))
            <div class="alert alert-success mb-3 col-lg-10" role="alert">
                {{ session('success') }}
            </div>
        @endif
                <div class="profile">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <h3 class="text-center mb-4">Profile Saya</h3>
                            <form action="/profil" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-12 text-center">
                                        <label for="avatar" class="mb-5" style="cursor: pointer; position: relative">
                                            <input type="file" accept="image/*" class="d-none" id="avatar"
                                                name="avatar" accept=".png, .jpg, .jpeg" onchange="previewImage()">
                                            <span class="btn bg-white shadow"
                                                style="position: absolute; top: -10px; right: -10px">
                                                <i class="fa fa-pencil"></i>
                                            </span>
                                            @if (isset($user->avatar))
                                                <img src="{{ asset('storage/' . $user->avatar) }}" width="100px"
                                                    alt="">
                                            @else
                                            @endif
                                            {{-- <img width="100px"
                                            src="{{ isset(@$user->avatar) ? asset('avatar/' . @$user->avatar) : asset('/assets/media/svg/avatars/blank.svg') }}"
                                            class="rounded" id="avatar-preview" alt="image"> --}}
                                        </label>
                                    </div>


                                    <div class="row mb-6">
                                        <label class="col-lg-4 required form-label">Nama Lengkap :</label>
                                        <div class="col-lg-8">
                                            <input type="text" placeholder="Name" name="nm_lengkap"
                                                class="form-control mb-2" value="{{ $user->nm_lengkap }}">
                                        </div>
                                    </div>

                                    <div class="row mb-6">
                                        <label class="col-lg-4 required form-label">Nama User:</label>
                                        <div class="col-lg-8">
                                            <input type="text" placeholder="Name" name="nm_user"
                                                class="form-control mb-2" value="{{ $user->nm_user }}">
                                        </div>
                                    </div>

                                    <div class="row mb-6">
                                        <label class="col-lg-4 required form-label">Email :</label>
                                        <div class="col-lg-8">
                                            <input type="text" placeholder="Email" name="email"
                                                class="form-control mb-2" value="{{ $user->email }}">
                                        </div>
                                    </div>

                                    <div class="row mb-6">
                                        <label class="col-lg-4 required form-label">Password :</label>
                                        <div class="col-lg-8">
                                            <input type="text" placeholder="password" name="password"
                                                class="form-control mb-2">
                                        </div>
                                    </div>

                                    <div class="row mb-6">
                                        <label class="col-lg-4 required form-label">Nomer Telepon :</label>
                                        <div class="col-lg-8">
                                            <input type="text" placeholder="No Telp" name="no_telepon"
                                                class="form-control mb-2" value="{{ @$user->no_telepon }}">
                                        </div>
                                    </div>

                                    <div class="row mb-6">
                                        <label class="col-lg-4 required form-label">Alamat :</label>
                                        <div class="col-lg-8">
                                            <input type="text" name="alamat" class="form-control mb-2"
                                                value="{{ @$user->alamat }}">
                                        </div>
                                    </div>

                                </div>
                                <div class="form-action text-right">
                                    <button type="submit" class="btn btn-info btn-large mb-2">Simpan</button>
                                    <a href="/" type="button" class="btn btn-danger btn-large mb-2 me-2">
                                        </i> Batal
                                    </a>
                                </div>
                            </form>

                        </div>

                    </div>

                </div>

        </section>
    </div>
@endsection
