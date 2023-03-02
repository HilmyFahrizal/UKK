<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;


class ResetPasswordController extends Controller
{

    public function cek()
    {
        return view('masuk.reset');
    }

    public function reset(Request $request)
    {
        $user = null;
        if ($request->has('email')) {
            $user = User::where('email', $request->email)->first();
            if ($user) {
                return view('masuk.passwordBaru', [
                    'user' => $user
                ]);
            } else {
                return back()->with('error', 'email tidak ada');
            }
        } else if ($request->has('token')) {
            if (!empty($request->password)) {
                $user = User::where('email', decrypt($request->currentEmail))->first();
                if ($user->created_at == decrypt($request->token)) {
                    $user->update([
                        'password' => Hash::make($request->password)
                    ]);
                }
            } else {
                return redirect('/cekEmail')->with('error', 'password tidak boleh kosong');
            }
        }


        return redirect('/login')->with('success', 'berhasil ubah password');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
    }
}
