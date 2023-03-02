@extends('dashboard.layouts.main')
@section('container')
    <div class="card m-4">
        <div class="card-body p-3">
            <div class="container bs-light-border-subtle">
                <form action="/dashboard/kategori" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="floatingInput" class="form-label">Nama Kategori</label>
                        <div id="plus">
                            <input type="text" class="form-control bg-light @error('nm_kategori') is-invalid @enderror"
                                name="nm_kategori" required value="{{ old('nm_kategori') }}"
                                oninvalid="this.setCustomValidity('data tidak boleh kosong')"
                                oninput="setCustomValidity('')" />
                        </div>
                        @error('nm_kategori')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-outline-success btn-dark">Tambah</button>
                </form>
            </div>
        </div>
    </div>
@endsection
