<?php

namespace App\Http\Controllers;

use auth;
use App\Models\User;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $produks = Produk::latest()->paginate(3);
        return view('tampilan.index', [
            'produks' => $produks,
        ]);
    }

    public function produk()
    {
        $produks = Produk::latest()->paginate(6);
        $kategoris = Kategori::all();
        return view('tampilan.produk', [
            'produks' => $produks,
            'kategoris' => $kategoris
        ])->with('success', 'Berhasil Menambahkan Produk');
    }

    public function detail($id)
    {
        $produk = Produk::where('id', $id)->first();
        return view('tampilan.detail', [
            'produk' => $produk,
        ]);
    }

    public function profil()
    {
        $user = User::where('id', auth()->user()->id)->first();
        return view('tampilan.profil', [
            'user' => $user,
        ]);
    }

    public function updateProfil(Request $request)
    {
        // dd($request->all());
        $user = User::where('id', auth()->user()->id)->first();
        $data = $request->validate([
            'avatar' => 'nullable|image|file|max:5000',
            'nm_lengkap' => 'required',
            'nm_user' => 'required',
            'email' => 'required',
            'password' => 'required',
            'no_telepon' => 'nullable|numeric',
            'alamat' => 'nullable',
        ]);
        $data['password'] = bcrypt($data['password']);

        if ($request->file(['avatar'])) {
            $data['avatar'] = $request->file('avatar')->store('avatar', 'public');
        } else {
            $data['avatar'] = $user->avatar;
        }

        User::where('id', auth()->user()->id)->update($data);

        return back()->with('success', 'berhasil update profil');
    }

    public function produkKategori(Kategori $kategori)
    {
        $produks = Produk::where('kategori_id', $kategori->id)->paginate(6);
        $kategoris = Kategori::all();
        return view('tampilan.produk', [
            'produks' => $produks,
            'kategoris' => $kategoris
        ]);
    }

    public function cari(Request $request)
    {
        if ($request->cari == null || $request->cari == '') {
            $produks = Produk::with(['kategori', 'merk'])->get();
        } else {
            $produks = Produk::where('nm_produk', 'like', '%' . $request->cari . '%')->with(['kategori', 'merk'])->get();
        }
        return response()->json($produks);
    }
}
