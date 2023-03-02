@extends('tampilan.layouts.index')
@section('container')
    <div class="container text-center" style="margin-top: 130px; margin-bottom: 30px">
        <h1>Detail Produk</h1>
    </div>
    <div class="container single_product_container mt-3">
        <div class="row">
            <div class="col-lg-6">
                <div class="single_product_pics">
                    <div class="single_product_thumbnails" style="height: auto">
                        <ul>
                            <li class="active"> <img src="{{ asset('storage/' . $produk->gambar) }}" alt=""
                                    data-image="{{ asset('storage/' . $produk->gambar) }}" height="400" class="img-fluid"
                                    style="object-fit: contain" />
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="product_details">
                    <div class="product_details_title">
                        <h2>{{ $produk->nm_produk }}</h2>
                        <h5 class="mt-3">Spesifikasi</h5>
                        <table>
                            <tr>
                                <td>Merek : {{ $produk->merk->nm_merk }}</td>
                            </tr>
                            <tr>
                                <td>Stok : {{ $produk->stok }}</td>
                            </tr>
                            <tr>
                                <td>Kategori : {{ $produk->kategori->nm_kategori }}</td>
                            </tr>
                            <td class="product_price">Harga : Rp. {{ number_format($produk->harga, 0, ',', '.') }}</td>
                            <tr>
                                <td>Berat : {{ $produk->berat }} Gram</td>
                            </tr>
                        </table>
                        <h5 class="mt-4">Deskripsi</h5>
                        <p>{{ $produk->deskripsi }}</p>
                        <form action="/keranjang/{{ $produk->id }}" method="POST">
                            @csrf
                            <input type="hidden" name="type" value="detail">
                            <input type="number" name="kuantitas" min="1" max="{{ $produk->stok }}" value="1">
                            @if ($produk->stok > 0)
                                <button type="submit" class="btn btn-lg btn-light rounded">
                                    <i class="fa-solid fa-cart-plus fa-xs"></i>
                                </button>
                            @else
                                <button disabled type="submit" class="btn btn-lg btn-light rounded">
                                    <i class="fa-solid fa-cart-plus fa-xs"></i>
                                </button>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
