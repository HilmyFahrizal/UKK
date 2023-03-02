@extends('dashboard.layouts.main')
@section('container')
    <div class="card m-4">
        <div class="card-body p-3">
            <div class="container bs-light-border-subtle">
                <form action="/dashboard/produk/{{ $produks->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-1">
                        <label for="floatingInput" class="form-label d-block">Gambar</label>
                        <img src="{{ asset('storage/' . $produks->gambar) }}" width="100" class="mb-4">
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
                            name="nm_produk" value="{{ old('nm_produk', $produks->nm_produk) }}" value="1000" required
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
                            <input type="number" min="1000"
                                class="form-control bg-light @error('harga') is-invalid @enderror" name="harga"
                                value="{{ old('harga', $produks->harga) }}" required
                                oninvalid="this.setCustomValidity('kesalahan input')" oninput="setCustomValidity('')" />
                            @error('harga')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-3">
                            <label for="floatingInput" class="form-label">berat</label>
                            <input type="number" min="1"
                                class="form-control bg-light @error('berat') is-invalid @enderror" name="berat"
                                value="{{ old('berat', $produks->berat) }}" required
                                oninvalid="this.setCustomValidity('kesalahan input')" oninput="setCustomValidity('')" />
                            @error('nm_produk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-3">
                            <label for="floatingInput" class="form-label">stok</label>
                            <input type="number" min="1"
                                class="form-control bg-light @error('stok') is-invalid @enderror" name="stok"
                                value="{{ old('stok', $produks->stok) }}" required
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
                                    @if (old('merk_id', $produks->merk_id) == $merk->id)
                                        <option value="{{ $merk->id }}" selected>{{ $merk->nm_merk }}</option>
                                    @else
                                        <option value="{{ $merk->id }}">{{ $merk->nm_merk }}</option>
                                    @endif
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
                                    @if (old('kategori_id', $produks->kategori_id) == $kategori->id)
                                        <option value="{{ $kategori->id }}" selected>{{ $kategori->nm_kategori }}</option>
                                    @else
                                        <option value="{{ $kategori->id }}">{{ $kategori->nm_kategori }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('kategori_id')
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
                            name="deskripsi" value="{{ old('deskripsi', $produks->deskripsi) }}" />
                        @error('deskripsi')
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
@section('script')
@endsection
