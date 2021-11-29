<?php

namespace App\Http\Controllers;

use App\Berkas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $berkasSukses = Berkas::where('status_berkas', 2)->where('user_id', Auth::user()->id)->count();
        $berkasTolak = Berkas::where('status_berkas', 1)->where('user_id', Auth::user()->id)->count();
        $berkasPending = Berkas::where('status_berkas', 0)->where('user_id', Auth::user()->id)->count();
        return view('karyawan.dashboard', compact('berkasSukses', 'berkasTolak', 'berkasPending'));
    }
}
