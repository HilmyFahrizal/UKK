<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DaftarController extends Controller
{
    public function index()
    {
        return view('masuk.daftar');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nm_lengkap' => 'required',
            'nm_user' => 'required',
            'no_telepon' => 'nullable',
            'email' => 'required|unique:users,email|email:dns',
            'password' => 'required',
            'is_admin' => 'default'
        ]);

        $data['password'] = bcrypt($data['password']);

        User::create($data);

        return redirect('/login')->with('Berhasil Mendaftarkan Akun');
    }
}
