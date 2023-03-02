<?php

namespace App\Http\Controllers;

use App\Models\Merk;
use App\Models\User;
use App\Models\Produk;
use App\Models\Pesanan;
use App\Models\Kategori;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $produk_terjual = Pesanan::with('pembayaran')->whereHas('pembayaran', function ($query) {
            return $query->where('payment_status', '2');
        })->get()->sum('kuantitas');
        $kategoris = Kategori::with('produk', 'pesanan')->get()->sortByDesc('terjual');
        $merks = Merk::with('produk.pesanan', 'pesanan.pembayaran')->get()->sortByDesc('terjual');
        // dd((int)$request->month);
        $produks_terlaris = Produk::with('pesanan', 'pembayaran')->withSum('pesanan', 'kuantitas')->whereHas('pembayaran', function ($query) use ($request) {
            $query = $query->where('payment_status', '2');
            if ($request->has('month') && $request->month != 'all') {
                $query = $query->whereMonth('pembayarans.updated_at', $request->month);
            }

            return $query;
        });

        $produks_terlaris = $produks_terlaris->orderBy('pesanan_sum_kuantitas', 'DESC')->paginate(7)->sortByDesc('terjual');
        $produks = Produk::all();
        $pesanans = Pesanan::all();

        $pembayarans = Pesanan::with('pembayaran')->whereHas('pembayaran', function ($query) {
            return $query->where('payment_status', '2');
        })->get();

        // $bayar = Kategori::with('produk')->whereHas('pesanan.pembayaran', function ($query) {
        //     return $query->where('payment_status', '2');
        // })->get();
        $users = User::all();

        return view('dashboard.index', [
            'produk_terjual' => $produk_terjual,
            'kategoris' => $kategoris,
            'merks' => $merks,
            'users' => $users,
            'produks_terlaris' => $produks_terlaris,
            'produks' => $produks,
            'pembayarans' => $pembayarans,
            'pesanans' => $pesanans,
        ]);
    }

    public function user()
    {
        $users = User::with(['pembayaran'])->where('is_admin', '!=', '1')->get();
        $pengeluarans = User::with(['pembayaran'])->whereHas('pembayaran', function ($query) {
            return $query->where('payment_status', '2');
        });
        return view('dashboard.user', [
            'users' => $users,
            'pengeluarans' => $pengeluarans,
        ]);
    }

    public function hapusUser($id)
    {
        $user = User::find($id);

        $user->delete();
        return back()->with('success', 'Berhasil Menghapus user');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('dashboard.editUser', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $user = User::find($id);
        $data = $request->validate([
            'avatar' => 'nullable|image|file|max:5000',
            'nm_lengkap' => 'required',
            'nm_user' => 'required',
            'email' => [Rule::unique('users', 'email')->ignore($id, 'id')],
            'password' => 'sometimes',
            'no_telepon' => ['numeric', 'nullable'],
            'alamat' => ['string', 'nullable'],
        ]);

        if ($data['email'] == null) {
            unset($data['email']);
        }

        if (!!$data['password']) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        if ($request->file(['avatar'])) {
            $data['avatar'] = $request->file('avatar')->store('avatar', 'public');
        } else {
            $data['avatar'] = $user->avatar;
        }

        $user->update($data);

        return redirect('/dashboard/user')->with('success', 'berhasil update user');
    }
}
