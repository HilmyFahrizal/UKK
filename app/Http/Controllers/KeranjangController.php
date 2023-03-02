<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Keranjang;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    public function keranjang()
    {
        $keranjangs = Keranjang::with(['produk'])->where('user_id', auth()->user()->id)->get();
        $total = 0;
        foreach ($keranjangs as $i) {
            $total += $i->subtotal;
        }

        return view('tampilan.keranjang', [
            'keranjangs' => $keranjangs,
            'total' => $total,
        ]);
    }

    public function store(Request $request, Produk $produk)
    {
        $request->validate([
            'type' => 'string|in:many,detail'
        ]);

        $produk = Produk::findOrFail($produk->id);
        $keranjang = Keranjang::where('produk_id', $produk->id)->where('user_id', auth()->user()->id)->first();
        if ($request->type == "detail") {
            if ($request->kuantitas == null || $request->kuantitas == 0) {
                return back()->with('error', 'Kuantitas tidak boleh 0');
            } else {
                if ($keranjang) {
                    $keranjang->update([
                        'kuantitas' => $keranjang->kuantitas + $request->kuantitas
                    ]);
                    return back()->with('success', 'Berhasil menambahkan ke keranjang');
                } else {
                    Keranjang::create([
                        'produk_id' => $produk->id,
                        'kuantitas' => $request->kuantitas,
                        'user_id' => auth()->user()->id
                    ]);
                    return back()->with('success', 'Berhasil menambahkan ke keranjang');
                }
            }
        } else if ($request->type == "many") {
            if ($keranjang) {
                $keranjang->update([
                    'kuantitas' => $keranjang->kuantitas + 1
                ]);
                return back()->with('success', 'Berhasil menambahkan ke keranjang');
            } else {
                Keranjang::create([
                    'produk_id' => $produk->id,
                    'kuantitas' => '1',
                    'user_id' => auth()->user()->id
                ]);
                return back()->with('success', 'Berhasil menambahkan ke keranjang');
            }
        }
    }

    public function destroy($id)
    {
        $keranjang = Keranjang::find($id);
        $keranjang->delete();
        return back()->with('success', 'Berhasil Menghapus Pesanan');
    }

    public function update(Keranjang $keranjang, Request $request)
    {
        $keranjang = Keranjang::findOrFail($keranjang->id);
        $keranjang->update([
            'kuantitas' => $request->kuantitas
        ]);
        return back()->with('update', 'Berhasil Menambahkan Kuantitas');
    }

    public function notif()
    {
        $notif = Keranjang::where('user_id', auth()->id)->count();
        return view('tampilan.partials.navbar', [
            'notif' => $notif,
        ]);
    }
}
