@extends('dashboard.layouts.main')
@section('container')
    <div class="card m-4">
        <div class="card-body p-3">
            <div class="container bs-light-border-subtle">
                <form action="/dashboard/kategori/{{ $kategori->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="floatingInput" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control bg-light @error('nm_kategori') is-invalid @enderror"
                            name="nm_kategori" value="{{ old('nm_kategori', $kategori->nm_kategori) }}" required
                            value="{{ old('nm_kategori') }}" oninvalid="this.setCustomValidity('data tidak boleh kosong')"
                            oninput="setCustomValidity('')" />
                        @error('nm_kategori')
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
