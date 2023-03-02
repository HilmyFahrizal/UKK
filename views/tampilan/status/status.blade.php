{{-- @dd($pembayarans) --}}
@extends('tampilan.layouts.index')
@section('container')
    <div class="container" style="margin-top: 130px">
        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center mb-5">
                        <h2 class="heading-section">Status</h2>
                    </div>
                </div>
                @if ($pembayarans->count() > 0)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-wrap">
                                <table class="table">
                                    <thead class="table-dark">
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Nama Penerima</th>
                                            <th>Alamat</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pembayarans as $i => $pembayaran)
                                            <tr class="text-center">
                                                <th scope="row">{{ $i + 1 }}</th>
                                                <td>{{ $pembayaran->Alamat->nm_penerima }}</td>
                                                <td>{{ $pembayaran->Alamat->alamat }}</td>
                                                <td>Rp. {{ number_format($pembayaran->total, 0, ',', '.') }}</td>
                                                <td>
                                                    @if ($pembayaran->payment_status == 1 && $pembayaran->status != 5)
                                                        <a href="#" class="badge rounded-pill text-white    "
                                                            style="background-color: #D05CFF">Belum Dibayar</a>
                                                    @elseif ($pembayaran->payment_status == 1 && $pembayaran->status == 5)
                                                        <a href="#" class="badge rounded-pill text-white    "
                                                            style="background-color: #f34114">Dibatalkan</a>
                                                    @elseif ($pembayaran->payment_status == 2 && $pembayaran->status == 1)
                                                        <a href="#" class="badge rounded-pill text-dark"
                                                            style="background-color: #41FFC0">Menunggu
                                                            Konfirmasi</a>
                                                    @elseif ($pembayaran->payment_status == 2 && $pembayaran->status == 2)
                                                        <a href="#" class="badge rounded-pill text-dark"
                                                            style="background-color: #F2F917">Diproses</a>
                                                    @elseif ($pembayaran->payment_status == 2 && $pembayaran->status == 3)
                                                        <a href="#" class="badge rounded-pill text-dark"
                                                            style="background-color: #A8FFEB">Dalam Perjalanan</a>
                                                    @elseif ($pembayaran->payment_status == 2 && $pembayaran->status == 4)
                                                        <a href="#" class="badge rounded-pill text-dark"
                                                            style="background-color: #6AFE5E">Telah
                                                            Diterima</a>
                                                    @elseif ($pembayaran->payment_status == 3)
                                                        <a href="#"
                                                            class="badge rounded-pill text-white btn-secondary">Kadaluarsa</a>
                                                    @else
                                                        <a href="#"
                                                            class="badge rounded-pill text-dark btn-danger">Dibatalkan</a>
                                                    @endif

                                                </td>
                                                <td>
                                                    @if ($pembayaran->payment_status == 1 && $pembayaran->status != 5)
                                                        <a href="/pembayaran/{{ $pembayaran->id }}"
                                                            class="btn btn-outline-success mb-2"><i
                                                                class="fas fa-wallet me-1"></i>Bayar!!</a>
                                                        <a href="/detailPesanan/{{ $pembayaran->id }}"
                                                            class="btn btn-outline-primary mb-2"><i
                                                                class="fas fa-eye me-1"></i>Detail</a>
                                                        <form action="/batalUbah/{{ $pembayaran->id }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="btn btn-outline-danger btn"
                                                                data-id="{{ $pembayaran->id }}"><i
                                                                    class="fa fa-times me-2 ps-1" aria-hidden="true"
                                                                    style="color: #f5332d"></i>Batalkan</button>
                                                        </form>
                                                    @elseif ($pembayaran->payment_status == 1 && $pembayaran->status == 5)
                                                        <a href="/detailPesanan/{{ $pembayaran->id }}"
                                                            class="btn btn-outline-primary"><i
                                                                class="fas fa-eye me-1"></i>Detail</a>
                                                        <a href="/detailPesanan/hapus/{{ $pembayaran->id }}"
                                                            class="btn btn-outline-danger btn"><i class="fa fa-trash-o me-1"
                                                                aria-hidden="true"></i>Hapus</a>
                                                    @elseif ($pembayaran->payment_status == 2 && $pembayaran->status == 3)
                                                        <form action="/updateDikirim/{{ $pembayaran->id }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="status" value="2">
                                                            <button type="submit" class="btn btn-outline-warning"><i
                                                                    class="fas fa-plane-arrival me-1"></i>Diterima</button>
                                                            <a href="/detailPesanan/{{ $pembayaran->id }}"
                                                                class="btn btn-outline-primary"><i
                                                                    class="fas fa-eye me-1"></i>Detail</a>
                                                        </form>
                                                    @elseif ($pembayaran->payment_status == 2 && $pembayaran->status == 4)
                                                        <a href="/detailPesanan/{{ $pembayaran->id }}"
                                                            class="btn btn-outline-primary"><i
                                                                class="fas fa-eye me-1"></i>Detail</a>
                                                    @elseif ($pembayaran->payment_status == 3 && $pembayaran->status == 5)
                                                        <a class="btn btn-outline-danger" data-bs-target="#exampleModal"><i
                                                                class="fas fa-trash me-1"></i>
                                                            hapus
                                                        </a>
                                                        <a href="/detailPesanan/{{ $pembayaran->id }}"
                                                            class="btn btn-outline-primary"><i
                                                                class="fas fa-eye me-1"></i>Detail</a>
                                                    @else
                                                        <a href="/detailPesanan/{{ $pembayaran->id }}"
                                                            class="btn btn-outline-primary"><i
                                                                class="fas fa-eye me-1"></i>Detail</a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-wrap">
                                <table class="table">
                                    <thead class="table-dark">
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Nama Penerima</th>
                                            <th>Alamat</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">
                                        <tr>
                                            <td colspan="6" class="text-center">----
                                                Tidak Ada Pesanan----</td>
                                        </tr>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="text-right">
                                    <a href="/produk" class="btn btn-lg btn-outline-dark">
                                        Beli Sekarang
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </section>
    </div>
    <!-- Modal -->
@endsection
