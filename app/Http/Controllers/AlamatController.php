<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use Illuminate\Http\Request;

class AlamatController extends Controller
{
    public function buatAlamat(Request $request)
    {
        // return $request;

        $data = $request->validate([
            'nm_penerima' => 'required',
            'no_hp' => 'required|numeric',
            'provinsi_id' => 'required',
            'kota_id' => 'required',
            'alamat' => 'required',
            'kode_pos' => 'required',
        ]);

        $data['user_id'] = auth()->user()->id;

        Alamat::create($data);
        return back()->with('success', 'Berhasil Menambahkan alamat');
    }
}
