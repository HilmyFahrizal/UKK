@extends('dashboard.layouts.main')
@section('container')
    <div class="card m-4">
        <div class="card-body p-3">
            <div class="container bs-light-border-subtle">
                <form action="/dashboard/produk" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-1">
                        <label for="floatingInput" class="form-label">Gambar</label>
                        <input type="file" class="form-control bg-light @error('gambar') is-invalid @enderror"
                            name="gambar" />
                        @error('gambar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-1">
                        <label for="floatingInput" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control bg-light @error('nm_produk') is-invalid @enderror"
                            name="nm_produk" required value="{{ old('nm_produk') }}"
                            oninvalid="this.setCustomValidity('kesalahan input')" oninput="setCustomValidity('')" />
                        @error('nm_produk')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row mb-1">
                        <div class="col-6">
                            <label for="floatingInput" class="form-label">Harga</label>
                            <input type="number" class="form-control bg-light @error('harga') is-invalid @enderror"
                                name="harga" min="1000" value="1000" required
                                oninvalid="this.setCustomValidity('kesalahan input')" oninput="setCustomValidity('')" />
                            @error('harga')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-3">
                            <label for="floatingInput" class="form-label">berat</label>
                            <input type="number" class="form-control bg-light @error('berat') is-invalid @enderror"
                                name="berat" min="1" value="1" required
                                oninvalid="this.setCustomValidity('kesalahan input')" oninput="setCustomValidity('')" />
                            @error('berat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-3">
                            <label for="floatingInput" class="form-label">stok</label>
                            <input type="number" min="1" value="1"
                                class="form-control bg-light @error('stok') is-invalid @enderror" name="stok" required
                                oninvalid="this.setCustomValidity('kesalahan input')" oninput="setCustomValidity('')" />
                            @error('nm_produk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-6">
                            <label for="floatingInput" class="form-label">merk</label>
                            <select name="merk_id" class="form-control bg-light @error('merk_id') is-invalid @enderror"
                                required oninvalid="this.setCustomValidity('Merk harus dipilih')"
                                oninput="setCustomValidity('')">Merk
                                <option value="">Pilih Merk..</option>
                                @foreach ($merks as $merk)
                                    <option value="{{ $merk->id }}">{{ $merk->nm_merk }}</option>
                                @endforeach
                            </select>
                            @error('merk_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="floatingInput" class="form-label">kategori</label>
                            <select name="kategori_id"
                                class="form-control bg-light @error('kategor_id') is-invalid @enderror" required
                                oninvalid="this.setCustomValidity('Kategori harus dipilih')"
                                oninput="setCustomValidity('')">kategori
                                <option value="">Pilih kategori..</option>
                                @foreach ($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->nm_kategori }}</option>
                                @endforeach
                            </select>
                            @error('kategor_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="floatingInput" class="form-label" required
                            oninvalid="this.setCustomValidity('Kategori harus dipilih')"
                            oninput="setCustomValidity('')">Deskrpsi </label>
                    <input type="text" class="form-control bg-light @error('deskripsi') is-invalid @enderror"
                            name="deskripsi" />
                        @error('deskripsi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-outline-success btn-dark">Tambah
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection
