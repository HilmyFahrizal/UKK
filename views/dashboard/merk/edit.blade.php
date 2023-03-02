@extends('dashboard.layouts.main')
@section('container')
    <div class="card m-4">
        <div class="card-body p-3">
            <div class="container bs-light-border-subtle">
                <form action="/dashboard/merk/{{ $merk->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-1">
                        <label for="floatingInput" class="form-label d-block">Logo</label>
                        <img src="{{ asset('storage/' . $merk->logo) }}" width="100" class="mb-4">
                        <input type="file" name="logo" class="form-control bg-light" />
                    </div>
                    <div class="mb-4">
                        <label for="floatingInput" class="form-label">Nama Merk</label>
                        <input type="text" class="form-control bg-light @error('nm_merk') is-invalid @enderror"
                            name="nm_merk" value="{{ old('nm_merk', $merk->nm_merk) }}" required
                            value="{{ old('nm_merk') }}" oninvalid="this.setCustomValidity('kesalahan input')"
                            oninput="setCustomValidity('')" />
                        @error('nm_merk')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-outline-warning btn-dark">Ubah</button>
                </form>
            </div>
        </div>
    </div>
@endsection
