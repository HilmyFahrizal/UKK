<?php

namespace App\Http\Controllers;

use App\Models\Merk;
use Illuminate\Http\Request;

class DashboardMerkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $merks = Merk::Paginate(5);
        return view('dashboard.merk.index', [
            'merks' => $merks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.merk.create');
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
            'logo' => 'image|file|max:6000',
            'nm_merk' => 'required|unique:merks,nm_merk',
        ]);

        if ($request->file(['logo'])) {
            $data['logo'] = $request->file('logo')->store('logo', 'public');
        }

        if (Merk::where('nm_merk', $data['nm_merk'])->first()) {
            return back()->with('gagal', 'Data yang dimasukkan sudah ada');
        }

        Merk::create($data);
        return redirect('/dashboard/merk')->with('success', 'Berhasil Memasukkan merk');
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
        $merk = Merk::findOrFail($id);
        return view('dashboard.merk.edit', [
            'merk' => $merk
        ]);
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
        $merk = Merk::findOrFail($id);
        $data = $request->validate([
            'logo' => 'image|file|max:6000',
            'nm_merk' => 'required',
        ]);

        if ($request->file(['logo'])) {
            $data['logo'] = $request->file('logo')->store('logo', 'public');
        } else {
            $data['logo'] = $merk->logo;
        }

        $merk->update($data);
        return redirect('/dashboard/merk')->with('success', 'Berhasil Edit Merk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Merk $merk)
    {
        $merk->delete();
        return back()->with('success', 'Berhasil Menghapus Merk');
    }
}
