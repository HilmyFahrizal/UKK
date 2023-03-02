<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Alamat;
use App\Models\Produk;
use App\Models\Pesanan;
use App\Models\Province;
use Barryvdh\DomPDF\Facade\PDF;
use App\Models\Keranjang;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use App\Services\Midtrans\CreateSnapTokenService;

class PembayaranController extends Controller
{
    public function checkout()
    {
        $keranjangs = Keranjang::where('user_id', auth()->user()->id)->with(['produk'])->get();
        $is_tersedia = true;
        foreach ($keranjangs as $keranjang) {
            if ($keranjang->kuantitas > $keranjang->produk->stok) {
                $is_tersedia = false;
            }
        }

        if (!$is_tersedia) {
            return back()->with('error', 'Kuantitas melebihi stok');
        }

        $total = 0;
        foreach ($keranjangs as $i) {
            $total += $i->subtotal;
        }
        $provinsis = Province::all();
        $alamats = Alamat::where('user_id', auth()->user()->id)->with(['provinsi', 'kota', 'user'])->get();
        return view('tampilan.pembayaran.checkout', [
            'keranjangs' => $keranjangs,
            'provinsis' => $provinsis,
            'alamats' => $alamats,
            'total' => $total
        ]);
    }

    public function provinces(Request $request)
    {
        if (isset($request->provinsi)) {
            $data = new City();
            $data = $data->where('province_id', $request->provinsi)->get();
            if ($data) {
                return response()->json($data, 200);
            }
            return response()->json([], 200);
        } else {
            $data = new City();
            return response()->json($data->get(), 200);
        }
    }

    public function pembayaran(Pembayaran $pembayaran)
    {
        $total = 0;
        foreach ($pembayaran->pesanans as $pesanan) {
            $total += $pesanan->sub_total;
        }


        $alamats = $pembayaran->alamat;

        return view('tampilan.pembayaran.pembayaran', [
            'pembayaran' => $pembayaran,
            'alamats' => $alamats,
            'total' => $total
        ]);
    }

    public function charger(Request $request)
    {
        // $barangs = Barang::all();
        // return $request;

        $data = $request->validate([
            'alamat_id' => 'required',
            'courier' => 'required',
            'layanan' => 'required',
            'catatan' => 'string|nullable',
            'ongkir' => 'required',
            'estimasi' => 'required',
        ]);
        // dd($request->all());

        $keranjangs = Keranjang::where('user_id', auth()->user()->id)->with(['produk', 'user'])->get();

        $total = 0;
        foreach ($keranjangs as $keranjang) {
            $total += $keranjang->subtotal;
        }

        $total += $request->ongkir;

        $input = [
            'user_id' => auth()->user()->id,
            'alamat_id' => $request->alamat_id,
            'courier' => $request->courier,
            'layanan' => $request->layanan,
            'catatan' => $request->catatan,
            'ongkir' => $request->ongkir,
            'estimasi' => $request->estimasi,
            'total' => $total,
        ];

        $pembayaran = Pembayaran::create($input);

        foreach ($keranjangs as $keranjang) {
            Pesanan::create([
                'produk_id' => $keranjang->produk_id,
                'pembayaran_id' => $pembayaran->id,
                'kuantitas' => $keranjang->kuantitas,
                'sub_total' => $keranjang->subtotal
            ]);

            $produk = Produk::find($keranjang->produk_id);
            $produk->update([
                'stok' => $produk->stok - $keranjang->kuantitas
            ]);

            Keranjang::destroy($keranjang->id);
        }

        $midtrans = new CreateSnapTokenService($pembayaran);
        $snapToken = $midtrans->getSnapToken();

        $pembayaran->snap_token = $snapToken;
        $pembayaran->save();

        return redirect('/pembayaran/' . $pembayaran->id);
    }

    public function cetakSatu($id)
    {
        $laporan = Pembayaran::with(['pesanans'])->find($id);

        $pdf = PDF::loadview('dashboard.pembelian.laporan', ['laporan' => $laporan]);
        return $pdf->stream();
    }
}
