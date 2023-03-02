<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OngkirController extends Controller
{
    public function ongkir(Request $request)
    {
        $alamat = Alamat::find($request->alamat_id);
        $keranjang = Keranjang::where('user_id', auth()->user()->id)->with(['produk'])->get();
        $weight = 0;
        foreach ($keranjang as $item) {
            $weight += $item->produk->berat * $item->kuantitas;
        }
        $response = Http::post('https://api.rajaongkir.com/starter/cost', [
            'key' => getenv('RAJA_ONGKIR_API_KEY'),
            'origin' => '444',
            'destination' => $alamat->kota_id,
            'weight' => $weight,
            'courier' => $request->courier,
        ]);

        return response()->json($response->json()['rajaongkir'], $response->status());
    }
}