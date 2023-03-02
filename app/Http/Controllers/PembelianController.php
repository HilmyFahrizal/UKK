<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;
use App\Models\Pembayaran;

class PembelianController extends Controller
{
    public function pemesanan()
    {
        $pembayarans = Pembayaran::with(['pesanans'])->where('payment_status', '=', '1')->where('status', '!=', '5')->paginate(5);
        return view('dashboard.pembelian.pemesanan', ['pembayarans' => $pembayarans]);
    }

    public function konfirmasi()
    {
        $pembayarans = Pembayaran::with(['pesanans'])->where('payment_status', '=', '2')->where('status', '=', '1')->paginate(5);
        return view('dashboard.pembelian.konfirmasi', ['pembayarans' => $pembayarans]);
    }

    public function proses()
    {
        $pembayarans = Pembayaran::with(['pesanans'])->where('payment_status', '=', '2')->where('status', '=', '2')->paginate(5);
        return view('dashboard.pembelian.proses', ['pembayarans' => $pembayarans]);
    }

    public function dikirim()
    {
        $pembayarans = Pembayaran::with(['pesanans'])->where('payment_status', '=', '2')->where('status', '=', '3')->paginate(5);
        return view('dashboard.pembelian.dikirim', ['pembayarans' => $pembayarans]);
    }

    public function selesai()
    {
        $pembayarans = Pembayaran::with(['pesanans'])->where('status', '=', '4')->paginate(5);
        return view('dashboard.pembelian.selesai', ['pembayarans' => $pembayarans]);
    }

    public function dibatalkan()
    {
        $pembayarans = Pembayaran::with(['pesanans'])->withTrashed()->where('status', '=', '5')->orWhere('payment_status', '=', '3')->paginate(5);
        return view('dashboard.pembelian.dibatalkan', ['pembayarans' => $pembayarans]);
    }

    public function updatekonfirmasi(Request $request, Pembayaran $pembayaran)
    {
        $validatedData = $request->validate([
            'status' => 'required'
        ]);
        Pembayaran::where('id', $pembayaran->id)->update([
            'status' => '2'
        ]);
        return back()->with('success', 'Berhasil Mengkonfirmasi Pesanan');
    }

    public function updateproses(Request $request, Pembayaran $pembayaran)
    {
        $validatedData = $request->validate([
            'status' => 'required'
        ]);
        Pembayaran::where('id', $pembayaran->id)->update([
            'status' => '3'
        ]);
        return back()->with('success', 'Berhasil Mengirim Pesanan');;
    }

    public function detailPesanan(Pembayaran $pembayaran)
    {
        $pembayaran->load('user', 'pesanans');
        $pembayaran->pesanans->load('produk');

        return view('dashboard.pembelian.detail', [
            'pembayarans' => $pembayaran,
        ]);
    }
}
