<?php

namespace App\Http\Controllers\Admin;

use App\Berkas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArsipController extends Controller
{
    public function index()
    {
        $berkas = Berkas::with(['user', 'mutasi'])
            ->orderBy('created_at', 'desc')
            ->where('status_berkas', 2)
            ->get();
        return view('admin.arsip.index', compact('berkas'));
    }
}
