<?php

namespace App\Http\Controllers\Admin;

use App\Berkas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $berkasSukses = Berkas::where('status_berkas', 2)->count();
        $berkasTolak = Berkas::where('status_berkas', 1)->count();
        $berkasPending = Berkas::where('status_berkas', 0)->count();
        return view('admin.dashboard', compact('berkasSukses','berkasTolak','berkasPending'));
    }
}
