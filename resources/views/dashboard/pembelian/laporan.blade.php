{{-- @dd($laporan) --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan {{ $laporan->user->nm_user }}</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            font-size: 14px;
            color: #333;
            line-height: 1.4;
        }

        table {
            width: 100%;
        }

        table.main td {
            padding: 0.25rem 0.5rem;
            vertical-align: start;
        }

        .text-end {
            text-align: right;
        }
    </style>
</head>

<body>
    <table style="width: 100%;" cellspacing="0" cellpadding="0">
        <tr>
            <td style="text-align: left;">
                <h1>INVOICE</h1>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">
                <img style="justify-content: center" src="{{ public_path('assets/front/images/logo7.png') }}"
                    width="200" alt="">
            </td>
        </tr>
    </table>

    <hr>

    {{-- <div>{{ $setting->nm_perusahaan }}</div> --}}
    <table>
        <tr>
            <td style="margin-left: 20px;text-align: right;">
                <div>No. Invoice : # {{ $laporan->uuid }}</div>
            </td>
        </tr>
        <table style="padding-top: 10px;">
            <tr>
                <td>Pemesan</td>
                <td>:</td>
                <td>{{ $laporan->user->nm_user }}</td>
            </tr>
            <tr>
                <td>Tanggal Bayar</td>
                <td>:</td>
                <td>
                    <div>{{ \Carbon\Carbon::parse($laporan->created_at)->format('d-m-Y') }}</div>
                </td>
            </tr>
            <tr>
                <td>Penerima</td>
                <td>:</td>
                <td>{{ $laporan->alamat->nm_penerima }}</td>
            </tr>
            <tr>
                <td>No. Telepon </td>
                <td>:</td>
                <td>{{ $laporan->alamat->no_hp }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>{{ $laporan->alamat->alamat }},
                    {{ $laporan->alamat->kota->nama_kab_kota }},{{ $laporan->alamat->provinsi->name_province }}</td>
            </tr>
        </table>
        </td>
        </tr>
    </table>
    {{-- <div style="margin-bottom: 3rem">
        <span>Total Tagihan:</span>
        <h2 style="margin-top: 0"> Rp. {{ number_format($laporan->total_harga, 0, ',', '.') }}
        </h2>
        <span>Metode Pembayaran: <strong>{{ $checkout->metode_pembayaran_text }}</strong></span>
    </div> --}}

    <div>
        <div style="margin-bottom: 1rem; margin-top: 20px">Rincian Produk Yang Dibeli :</div>
        <div>
            <table class="main" border="1" cellspacing="0">
                <thead>
                    <tr>
                        <th style="min-width: 200px">Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div>
                                <strong>
                                    @foreach ($laporan->pesanans as $pesanan)
                                        <li style="list-style: none">{{ $pesanan->produk->nm_produk }}</li>
                                    @endforeach
                                </strong>
                            </div>
                        </td>
                        <td class="text-end">
                            @foreach ($laporan->pesanans as $pesanan)
                                <li style="list-style: none"> <span> Rp.
                                        {{ number_format($pesanan->produk->harga, 0, ',', '.') }}</span></li>
                            @endforeach
                        </td>
                        <td class="text-end">
                            @foreach ($laporan->pesanans as $pesanan)
                                <li style="list-style: none"><span>{{ $pesanan->kuantitas }}</span></li>
                            @endforeach
                        </td>
                        <td class="text-end">
                            @foreach ($laporan->pesanans as $pesanan)
                                <span>
                                    <li style="list-style: none"> Rp.
                                        {{ number_format($pesanan->sub_total, 0, ',', '.') }}</li>
                                </span>
                            @endforeach
                            <br><br>
                            <span>Ongkir : Rp.
                                {{ number_format($laporan->ongkir, 0, ',', '.') }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-end">Total Belanja</td>
                        <td class="text-end">
                            <h3 style="margin: 0"> Rp.
                                {{ number_format($laporan->total, 0, ',', '.') }}
                            </h3>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
