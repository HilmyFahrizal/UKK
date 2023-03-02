<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Merk;
use App\Models\Produk;
use Illuminate\Http\Request;

class DashboardProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produks = Produk::with(['kategori', 'merk'])->sortable()->paginate(5);
        return view('dashboard.produk.index', [
            'produks' => $produks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $merks = Merk::get();
        $kategoris = Kategori::get();
        return view('Dashboard.produk.create', [
            'merks' => $merks,
            'kategoris' => $kategoris
        ])->with('succes', 'Berhasil Menambahkan Produk');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'gambar' => 'image|file|max:5000',
            'nm_produk' => 'required',
            'deskripsi' => 'required',
            'merk_id' => 'required',
            'harga' => 'required|min:1',
            'berat' => 'required|min:1',
            'stok' => 'required|min:1',
            'kategori_id' => 'required'
        ]);

        if ($request->file(['gambar'])) {
            $data['gambar'] = $request->file('gambar')->store('gambar', 'public');
        }

        produk::create($data);
        return redirect('/dashboard/produk')->with('succes', 'Berhasil Memasukkan Produk');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produks = Produk::findOrFail($id);
        $merks = Merk::get();
        $kategoris = Kategori::get();
        return view('Dashboard.produk.edit', [
            'produks' => $produks,
            'merks' => $merks,
            'kategoris' => $kategoris
        ])->with('succes', 'Berhasil Mengedit Produk');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);
        $data = $request->validate([
            'gambar' => 'image|file|max:5000',
            'nm_produk' => 'required',
            'deskripsi' => 'required',
            'merk_id' => 'required',
            'harga' => 'required|min:1',
            'berat' => 'required|min:1',
            'stok' => 'required|min:1',
            'kategori_id' => 'required'
        ]);

        if ($request->file(['gambar'])) {
            $data['gambar'] = $request->file('gambar')->store('gambar', 'public');
        } else {
            $data['gambar'] = $produk->gambar;
        }

        $produk->update($data);
        return redirect('/dashboard/produk')->with('success', 'Berhasil Edit Produk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produks = Produk::with(['kategori', 'merk'])->find($id);
        $produks->delete();
        return back()->with('success', 'Berhasil Menghapus Produk');
    }
}
