{{-- @dd($pembayarans) --}}
@extends('tampilan.layouts.index')
@section('container')
    <div class="container" style="margin-top: 130px">
        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center mb-5">
                        <h2 class="heading-section">Detail Pesanan</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="table-wrap">
                            <table>
                                <tr>
                                    <td>
                                        <div class="row">
                                            <div class="col-4 font-weight-bold m-0">Nama Penerima </div>
                                            <div class="col-8">
                                                <span>: {{ $pembayarans->alamat->nm_penerima }}</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 font-weight-bold m-0">Tgl Pembayaran </div>
                                            <div class="col-4">
                                                <div>:
                                                    {{ \Carbon\Carbon::parse($pembayarans->created_at)->format('d-m-Y') }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 font-weight-bold m-0">No. Telepon </div>
                                            <div class="col-8">
                                                <span class="m-0">: {{ $pembayarans->alamat->no_hp }}</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 font-weight-bold m-0">Alamat </div>
                                            <div class="col-8">
                                                <span class="m-0">: {{ $pembayarans->alamat->alamat }},
                                                    {{ $pembayarans->alamat->kota->nama_kab_kota }},{{ $pembayarans->alamat->provinsi->name_province }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 font-weight-bold m-0">Catatan Pembeli</div>
                                            <div class="col-8">
                                                <span class="m-0">: {{ $pembayarans->catatan }}
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <table class="table mt-3">
                                <thead class="table-dark text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Gambar</th>
                                        <th>Nama Produk</th>
                                        <th>Harga</th>
                                        <th>Kuantitas</th>
                                        <th>Sub Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pembayarans->pesanans as $pesanan)
                                        <tr class="text-center">
                                            <td scope="row">{{ $loop->iteration }}</td>
                                            <td><img src="{{ asset('storage/' . $pesanan->produk->gambar) }}" alt=""
                                                    style="width:60px; height:50px;object-fit: contain"></td>
                                            <td>{{ $pesanan->produk->nm_produk }}</td>
                                            <td>{{ number_format($pesanan->produk->harga, 0, ',', '.') }}</td>
                                            <td>{{ $pesanan->kuantitas }}</td>
                                            <td>Rp. {{ number_format($pesanan->sub_total, 0, ',', '.') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <table class="table ">
                                <tr>
                                    <th class="text-left ps-4">ongkir</th>
                                    <td class="fs-10 fw-bold text-right" style="padding-right: 45px">Rp.
                                        {{ number_format($pembayarans->ongkir) }}</td>
                                </tr>
                            </table>
                            <table class="table table-striped">
                                <tr>
                                    <th class="text-left ps-4">Total</th>
                                    <td class="fs-10 fw-bold text-right" style="padding-right: 45px">Rp.
                                        {{ number_format($pembayarans->total) }}</td>
                                </tr>
                            </table>
                            {{-- @dd($pembayarans->payment_status, $pembayarans) --}}
                            @if ($pembayarans->payment_status == 1)
                                <div class="row m-0">
                                    <div class="col-12 mb-4 p-0">
                                        <div> <button class="btn btn-primary ya" id="bayar">Bayar<span
                                                    class="fas fa-arrow-right ps-2"></span>
                                            </button></div>
                                    </div>
                                </div>
                            @else
                                <div class="row m-0">
                                    <div class="col-12 mb-4 p-0">
                                        <div> <a href="/pesanan" class="btn btn-primary ya"><span
                                                    class="fas fa-arrow-left pe-2"></span>kembali
                                            </a></div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('script')
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
    </script>
    <script>
        $('#bayar').on('click', function(e) {
            const pesan = $('.pesan');
            e.preventDefault();
            snap.pay("{{ $pembayarans->snap_token }}", {
                onSuccess: function(result) {
                    console.log(result);
                    window.location.href = '/pesanan'
                }
            })
        })
    </script>
@endsection
