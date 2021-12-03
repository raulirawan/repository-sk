<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function index()
    {
        return view('admin.password.index');
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'oldPassword' => 'required',
            'password' => 'required|confirmed',
        ]);
        if (!(Hash::check($request->get('oldPassword'), Auth::user()->password))) {

            return redirect()->route('ganti-password.admin.index')->with('error', 'Password lama anda salah');
        }

        if (strcmp($request->get('oldPassword'), $request->get('password')) == 0) {
            return redirect()->route('ganti-password.admin.index')->with('error', 'Password baru tidak boleh sama dengan Password lama');
        }

        $user = Auth::user();
        $user->password = bcrypt($request->get('password'));
        $user->save();

        return redirect()->route('ganti-password.admin.index')->with('success', 'Password anda berhasil di ubah!');
    }
}
