@extends('tampilan.layouts.index')
@section('container')
    <div class="container" style="margin-top: 130px">
        @if (session('success'))
            <div class="alert alert-success mb-3 col-lg-10" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if (session('update'))
            <div class="alert alert-success mb-3 col-lg-10" role="alert">
                {{ session('update') }}
            </div>
        @endif
        <div class="card row pt-3">
            <div class="card-body">
                <h2 style="text-align: center">Keranjang</h2>
            </div>
            <div class="row card-body">
                <div class="col-lg-12">
                    <table class="table mt-1 ms-4 card-body text-center">
                        <thead>
                            <tr>
                                <th></th>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Nama produk</th>
                                <th>Harga</th>
                                <th>Kuantitas</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($keranjangs->count() > 0)
                                @foreach ($keranjangs as $i => $keranjang)
                                    <tr class="table-body-row">
                                        <td class="product-remove">
                                            <form action="/keranjang/hapus/{{ $keranjang->id }}" method="post"
                                                class="mt-2">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-sm btn-danger"><i
                                                        class="fa-solid fa-trash fa-cart-arrow-up fa-xs"aria-hidden="true"></i></button>
                                            </form>
                                        </td>
                                        <td>{{ $i + 1 }}</td>
                                        <td class="product-image"><img
                                                src="{{ asset('storage/' . $keranjang->produk->gambar) }}" alt=""
                                                style="width:60px; height:50px;object-fit: contain">
                                        </td>
                                        <td class="product-name">{{ $keranjang->produk->nm_produk }}</td>
                                        <td class="product-price">Rp.
                                            {{ number_format($keranjang->produk->harga, 0, ',', '.') }}
                                        </td>
                                        <td class="product-quantity">
                                            <form action="/keranjang/{{ $keranjang->produk->id }}/update" method="post">
                                                @csrf
                                                @method('patch')
                                                <input type="number" name="kuantitas" class="kuantitas" id="kuantitas"
                                                    style="width: 25%;" min="1" max="{{ $keranjang->produk->stok }}"
                                                    data-id="{{ $keranjang->id }}" value="{{ $keranjang->kuantitas }}">
                                            </form>
                                        </td>
                                        <td class="product-total">Rp.
                                            {{ number_format($keranjang->subtotal, 0, ',', '.') }}
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="text-center">----
                                        Keranjang kosong----</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="col-12">
                    <table class="table w-100 mt-1 ms-4 card-body text-right">
                        <tr>
                            <th colspan="3" class="text-left">Total</th>
                            <td colspan="9" class="text-right">Rp. {{ number_format($total, 0, ',', '.') }}</td>
                        </tr>
                    </table>
                    @if ($keranjangs->count() > 0)
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="/checkout" class="btn btn-dark btn-outline-info me-md-2">Checkout
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>


        <script>
            function debounce(func, timeout = 1000) {
                let timer;
                return (...args) => {
                    clearTimeout(timer);
                    timer = setTimeout(() => {
                        func.apply(this, args);
                    }, timeout);
                };
            }

            document.querySelectorAll('.kuantitas').forEach(item => {
                item.addEventListener('input', debounce(function() {
                    const id = item.dataset.id;
                    const kuantitas = item.value;
                    const url = `/keranjang/${id}/update`;
                    $.ajax({
                        url: url,
                        method: 'post',
                        headers: {
                            'X-CSRF-TOKEN': '{{ @csrf_token() }}'
                        },
                        data: {
                            kuantitas: kuantitas,
                        },
                        success: function(response) {
                            window.location.reload();
                        }
                    });
                }, 1000));
            });
        </script>
    @endsection
