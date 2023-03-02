{{-- @dd($produks) --}}
@extends('dashboard.layouts.main')
@section('container')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success mb-3 col-lg-10" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="card row pt-3 pe-2">
            <div class="card-body p-1">
                <h2 style="text-align: center">Konfirmasi Pesanan</h2>
            </div>
            <div class="row card-body">
                <table class="table mt-1 ms-3 text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama pembeli</th>
                            <th>total</th>
                            <th>status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($pembayarans->count() > 0)
                            @foreach ($pembayarans as $i => $pembayaran)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $pembayaran->alamat->nm_penerima }}</td>
                                    <td>Rp. {{ number_format($pembayaran->total, 0, ',', '.') }}</td>
                                    <td>{{ $pembayaran->payment_status == '2' ? 'Sudah Dibayar' : '' }}</td>
                                    <td>
                                        <form action="/dashboard/updateKonfirmasi/{{ $pembayaran->id }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="status" value="2">
                                            <button type="submit" class="btn btn-outline-warning btn-sm">Konfirmasi</button>
                                            <a href="/dashboard/detailPesanan/{{ $pembayaran->id }}" type="button"
                                                class="btn btn-outline-info btn-sm" data-id=""><i class="fa fa-eye"
                                                    aria-hidden="true"></i></a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" class="text-center"> ------------------------------------------ Tidak ada
                                    pesanan yang harus dikonfirmasi ------------------------------------------ </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            {{-- <div class="pull-center">
                {{ $pembayarans->links() }}
            </div> --}}
        </div>
    </div>
@endsection
