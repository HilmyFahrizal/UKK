@extends('dashboard.layouts.main')
@section('container')
    <div class="container">
        <div class="card row pt-3">
            <section class="ftco-section">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6 text-center mb-5">
                            <h2 class="heading-section">Detail Pesanan User</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-wrap">
                                <table>
                                    <tr>
                                        <td>Nama User </td>
                                        <td>
                                            <div>: {{ $pembayarans->user->nm_user }}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nama Penerima</td>
                                        <td>
                                            <div>: {{ $pembayarans->alamat->nm_penerima }}</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Pembayaran</td>
                                        <td>
                                            @if ($pembayarans->payment_status = 2)
                                                <div>:
                                                    {{ \Carbon\Carbon::parse($pembayarans->created_at)->format('d-m-Y') }}
                                                </div>
                                            @else
                                                <div>:
                                                    {{ \Carbon\Carbon::parse($pembayarans->pesanan->created_at)->format('d-m-Y') }}
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>No. Telepon </td>
                                        <td>
                                            <span class="m-0">: {{ $pembayarans->alamat->no_hp }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Alamat </td>
                                        <td>
                                            <span class="m-0">: {{ $pembayarans->alamat->alamat }},
                                                {{ $pembayarans->alamat->kota->nama_kab_kota }},{{ $pembayarans->alamat->provinsi->name_province }}
                                            </span>
                                        </td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Catatan Pembeli </td>
                                        <td>
                                            <span class="m-0">: {{ $pembayarans->catatan }}
                                            </span>
                                        </td>
                                        </td>
                                    </tr>
                                </table>
                                <table class="table mt-3">
                                    <thead class="table-dark">
                                        <tr class="text-center">
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
                                                <td><img src="{{ asset('storage/' . $pesanan->produk->gambar) }}"
                                                        alt="" style="width:60px; height:50px;"></td>
                                                <td>{{ $pesanan->produk->nm_produk }}</td>
                                                <td>{{ $pesanan->produk->harga }}</td>
                                                <td>{{ $pesanan->kuantitas }}</td>
                                                <td>Rp. {{ number_format($pesanan->sub_total, 0, ',', '.') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <table class="table ">
                                    <tr class="col-12">
                                        <th class="text-left ps-4">ongkir</th>
                                        <td class="fs-10 fw-bold text-end" style="padding-right: 45px">Rp.
                                            {{ number_format($pembayarans->ongkir) }}</td>
                                    </tr>
                                </table>
                                <table class="table">
                                    <tr>
                                        <th class="text-left ps-4">Total</th>
                                        <td class="fs-10 fw-bold text-end" style="padding-right: 45px">Rp.
                                            {{ number_format($pembayarans->total) }}</td>
                                    </tr>
                                </table>
                                @if ($pembayarans->payment_status == 1)
                                    <div class="row m-0">
                                        <div class="col-12  mb-4 p-0">
                                            <div> <a href="/dashboard/pemesanan"
                                                    class="btn btn-dark btn-outline-primary ya"><span
                                                        class="fas fa-arrow-left pe-2"></span>kembali
                                                </a></div>
                                        </div>
                                    </div>
                                @elseif ($pembayarans->status == 1)
                                    <div class="row m-0">
                                        <div class="col-12  mb-4 p-0">
                                            <div> <a href="/dashboard/konfirmasi"
                                                    class="btn btn-dark btn-outline-primary ya"><span
                                                        class="fas fa-arrow-left pe-2"></span>kembali
                                                </a></div>
                                        </div>
                                    </div>
                                @elseif ($pembayarans->status == 2)
                                    <div class="row m-0">
                                        <div class="col-12  mb-4 p-0">
                                            <div> <a href="/dashboard/proses"
                                                    class="btn btn-dark btn-outline-primary ya"><span
                                                        class="fas fa-arrow-left pe-2"></span>kembali
                                                </a></div>
                                        </div>
                                    </div>
                                @elseif ($pembayarans->status == 3)
                                    <div class="row m-0">
                                        <div class="col-12  mb-4 p-0">
                                            <div> <a href="/dashboard/dikirim"
                                                    class="btn btn-dark btn-outline-primary ya"><span
                                                        class="fas fa-arrow-left pe-2"></span>kembali
                                                </a></div>
                                        </div>
                                    </div>
                                @elseif ($pembayarans->status == 4)
                                    <div class="row m-0">
                                        <div class="col-12  mb-4 p-0">
                                            <div> <a href="/dashboard/selesai"
                                                    class="btn btn-dark btn-outline-primary ya"><span
                                                        class="fas fa-arrow-left pe-2"></span>kembali
                                                </a></div>
                                        </div>
                                    </div>
                                @else
                                    <div class="row m-0">
                                        <div class="col-12  mb-4 p-0">
                                            <div> <a href="/dashboard/dibatalkan"
                                                    class="btn btn-dark btn-outline-primary ya"><span
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
    </div>
@endsection
