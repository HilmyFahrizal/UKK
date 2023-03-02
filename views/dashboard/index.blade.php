@extends('dashboard.layouts.main')
@section('container')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">User</p>
                                    <h5 class="font-weight-bolder">
                                        {{ $users->count() }}
                                    </h5>
                                    <p class="mb-0">
                                        pengguna website
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-success shadow-danger text-center rounded-circle">
                                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Produk </p>
                                    <h5 class="font-weight-bolder">
                                        {{ $produks->count() }}
                                    </h5>
                                    <p class="mb-0">
                                        Produk yang dimiliki
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-info shadow-success text-center rounded-circle">
                                    <i class="ni ni-app text-white text-lg opacity-10"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-1 text-uppercase font-weight-bold">Terjual</p>
                                    <h5 class="font-weight-bolder">
                                        {{ $produk_terjual }}
                                    </h5>
                                    <p class="mb-0">
                                        Stok terjual
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-warning shadow-primary text-center rounded-circle">
                                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Pendapatan</p>
                                    <h5 class="font-weight-bolder">
                                        Rp.
                                        {{ number_format($pembayarans->sum('sub_total'), 0, ',', '.') }}
                                    </h5>
                                    <p class="mb-0">
                                        Keuntungan didapat
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow-warning text-center rounded-circle">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-header pb-0 p-3">
                        <h6 class="mb-0">Merk</h6>
                    </div>
                    <div class="card-body p-3">
                        @foreach ($merks as $merk)
                            <ul class="list-group">
                                <li
                                    class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                    <div class="d-flex align-items-center">
                                        <div class="icon icon-shape icon-lg me-3 shadow text-center"
                                            style="padding-top: 12px">
                                            <img src="{{ asset('storage/' . @$merk->logo) }}" width="40" height="40"
                                                alt="" style="object-fit: contain">
                                        </div>
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-1 text-dark text-sm">{{ $merk->nm_merk }}</h6>
                                            <span class="text-xs">{{ $merk->produk->count() }} Produk, <span
                                                    class="font-weight-bold">{{ $merk->terjual }}
                                                    Terjual</span></span>
                                        </div>
                                    </div>
                                    {{-- <div class="d-flex">
                                        <button
                                            class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i
                                                class="ni ni-bold-right" aria-hidden="true"></i></button>
                                    </div> --}}
                                </li>
                            </ul>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-lg-0 mb-4">
                <div class="card ">
                    <div class="card-header pb-0 p-3">
                        <div class="d-flex justify-content-between">
                            <h6 class="mb-2">Produk Terlaris</h6>
                            <form method="GET">
                                <select name="month" id="month">
                                    <option hidden selected>Pilih Bulan</option>
                                    <option value="all">Semua</option>
                                    <option value="01">Januari</option>
                                    <option value="02">Februari</option>
                                    <option value="03">Maret</option>
                                    <option value="04">April</option>
                                    <option value="05">Mei</option>
                                    <option value="06">Juni</option>
                                    <option value="07">Juli</option>
                                    <option value="08">Agustus</option>
                                    <option value="09">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                            </form>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center ">
                            <tbody>
                                @foreach ($produks_terlaris as $produk)
                                    <tr>
                                        <td class="w-30">
                                            <div class="d-flex px-2 py-1 align-items-center">
                                                <div>
                                                    <img src="{{ asset('storage/' . @$produk->gambar) }}" width="35"
                                                        height="35" alt="" style="object-fit: contain">
                                                </div>
                                                <div class="ms-4">
                                                    <p class="text-xs font-weight-bold mb-0">Produk:</p>
                                                    <h6 class="text-sm mb-0">{{ $produk->nm_produk }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">Terjual:</p>
                                                <h6 class="text-sm mb-0">{{ $produk->terjual }}</h6>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">Stok sisa:</p>
                                                <h6 class="text-sm mb-0">{{ $produk->stok }}</h6>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">Total Pendapatan:</p>
                                                <h6 class="text-sm mb-0">Rp.
                                                    {{ number_format($produk->untung, 0, ',', '.') }}
                                                </h6>
                                            </div>
                                        </td>
                                        {{-- <td class="align-middle text-sm">
                                            <div class="col text-center">
                                                <p class="text-xs font-weight-bold mb-0">Bounce:</p>
                                                <h6 class="text-sm mb-0">29.9%</h6>
                                            </div>
                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- <div class="pull-center">
                        {{ $produks_terlaris->links() }}
                    </div> --}}
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-header pb-0 p-3">
                        <h6 class="mb-0">Kategori</h6>
                    </div>
                    <div class="card-body p-3">
                        @foreach ($kategoris as $kategori)
                            <ul class="list-group">
                                <li
                                    class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="icon icon-shape icon-sm me-3 py-auto bg-gradient-dark shadow text-center">
                                            <i class="fa fa-list-ul text-white opacity-10"></i>
                                        </div>
                                        {{-- @foreach ($pesanans as $pesanan) --}}
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-1 text-dark text-sm">{{ $kategori->nm_kategori }}</h6>
                                            <span class="text-xs">{{ $kategori->produk->count() }} Produk, <span
                                                    class="font-weight-bold">{{ $kategori->terjual }}
                                                    Terjual</span></span>
                                        </div>
                                    </div>
                                    {{-- <div class="d-flex">
                                        <button
                                            class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i
                                                class="ni ni-bold-right" aria-hidden="true"></i></button>
                                    </div> --}}
                                </li>
                            </ul>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @include('dashboard.partials.footer')
    </div>
@endsection
@section('script')
    <script>
        const select = document.getElementById('month');

        select.addEventListener('change', function(e) {
            this.form.submit();
        }, false);
    </script>
@endsection
