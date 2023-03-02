<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index()
    {
        $produks = [];
        $produk = Produk::all();
        foreach ($produk as $data) {
            $produks[] = $data->id;
        }

        $pembayarans = Pembayaran::where('user_id', auth()->user()->id)->with(['pesanans', 'Alamat'])->get();
        return view('tampilan.status.status', [
            'pembayarans' => $pembayarans,
            'produks' => $produks
        ]);
    }

    public function detail(Pembayaran $pembayaran)
    {
        $pembayaran->load('user', 'pesanans');
        $pembayaran->pesanans->load('produk');

        return view('tampilan.status.detail', [
            'pembayarans' => $pembayaran,
        ]);
    }

    public function updatedikirim(Request $request, Pembayaran $pembayaran)
    {
        $validatedData = $request->validate([
            'status' => 'required'
        ]);
        Pembayaran::where('id', $pembayaran->id)->update([
            'status' => '4'
        ]);
        return back();
    }

    public function batalUbah($id)
    {
        $pembayaran = Pembayaran::where('id', $id)->first();

        $pembayaran->update([
            'status' => '5'
        ]);
        foreach ($pembayaran->pesanans as $pesanan) {
            $produk = Produk::where('id', $pesanan->produk_id)->first();
            $produk->update([
                'stok' => $produk->stok + $pesanan->kuantitas
            ]);
        }
        return back()->with('success', 'Berhasil membatalkan pesanan');
    }

    public function hapus($id)
    {
        $pembayaran = Pembayaran::find($id);
        $pembayaran->delete();

        return back();
    }
}
