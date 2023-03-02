{{-- @dd(Request::all()) --}}
@extends('tampilan.layouts.index')
@section('container')
    <div class="containe" style="margin-top: 150px">
        <div class="container my-5">
            <div class="containerya">
                <div class="row m-0">
                    <div class="col-lg-7 pb-5">
                        <div class="row">
                            <div class="row m-0 bg-light">
                                <div class="col-12 px-4 pt-4">
                                    <table class="table table-borderless">
                                        <thead>
                                            <tr>
                                                <div class="d-flex justify-content-between mb-2">
                                                    <th class="fs-14 fw-bold text-center">Nama</th>
                                                    <th class="fs-14 fw-bold text-center">Jumlah</th>
                                                    <th class="fs-14 fw-bold text-center">Harga</th>
                                                    <th class="fs-14 fw-bold text-center">Subtotal</th>
                                                </div>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pembayaran->pesanans as $pesanan)
                                                <tr>
                                                    <div class="d-flex justify-content-center mb-2">
                                                        <td class="textmuted text-center">
                                                            {{ $pesanan->produk->nm_produk }}</td>
                                                        <td class="textmuted text-center">{{ $pesanan->kuantitas }}</td>
                                                        <td class="textmuted text-center">Rp.
                                                            {{ number_format($pesanan->produk->harga, 0, ',', '.') }}</td>
                                                        <td class="fs-10 fw-bold text-center">Rp.
                                                            {{ number_format($pesanan->sub_total, 0, ',', '.') }}</td>
                                                    </div>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <table class="table w-100 mt-1 card-body text-right table-borderless">
                                        <tr>
                                            <th class="textmuted text-left ps-4">Ongkir</th>
                                            <td class="fs-10 fw-bold text-right" style="padding-right: 45px">Rp.
                                                {{ number_format($pembayaran->ongkir) }}</td>
                                        </tr>
                                        <tr>
                                            <th class="textmuted fw-bold text-left ps-4">Total</th>
                                            <td class="h6" style="padding-right: 20px">Rp.
                                                {{ number_format($total + $pembayaran->ongkir, 0, ',', '.') }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 p-0 ps-lg-4">
                        <div class="row m-0">
                            <div class="col-12 px-0">
                                <div class="row bg-light m-0">
                                    <div class="col-12 px-4 mt-4" style="justify-content: space-between">
                                        <div class="d-flex justify-content-between">
                                            <p class="fw-bold"> Detail Pesanan</p>
                                            <p class="text-end">
                                                {{ \Carbon\Carbon::now()->format('d-m-Y') }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-12 px-4">
                                        <div class="d-flex  mb-4">
                                            <span class="">
                                                <p class="text-muted">Nama Penerima</p>
                                                <input class="form-control1" type="text"
                                                    value="{{ $alamats->nm_penerima }}">
                                            </span>
                                            <div class=" ml-auto d-flex flex-column align-items-end">
                                                <p class="text-muted">No. telepon</p>
                                                <input class="form-control3 text-end" type="text"
                                                    value="{{ $alamats->no_hp }}">
                                            </div>
                                        </div>
                                        <div class="d-flex mb-5">
                                            <span class="">
                                                <p class="text-muted">Alamat</p>
                                                <input class="form-control1" type="text" value="{{ $alamats->alamat }}">
                                            </span>
                                            <div class="ml-auto d-flex flex-column align-items-end">
                                                <p class="text-muted">Layanan</p>
                                                <input class="form-control3 text-end" type="text"
                                                    value="{{ $pembayaran->courier }}" placeholder="XXX">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-0">
                                    <div class="col-12  mb-4 p-0">
                                        <div> <button class="btn btn-primary ya" id="bayar">Bayar<span
                                                    class="fas fa-arrow-right ps-2"></span>
                                            </button></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
    </script>
    <script>
        $('#bayar').on('click', function(e) {
            const pesan = $('.pesan');
            e.preventDefault();
            snap.pay("{{ $pembayaran->snap_token }}", {
                onSuccess: function(result) {
                    console.log(result);
                    window.location.href = '/pesanan'
                },
                onPending: function(result) {
                    console.log(result);
                    return
                }
            })
        })
    </script>
@endsection
