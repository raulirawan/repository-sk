<?php

namespace App\Http\Controllers\Admin;

use PDF;
use App\Berkas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BerkasController extends Controller
{
    public function index()
    {
        $berkas = Berkas::with(['user', 'mutasi'])
            ->orderBy('created_at', 'desc')
            ->where('status_berkas', 0)
            ->orWhere('status_berkas', 1)
            ->get();
        return view('admin.berkas.index', compact('berkas'));
    }

    public function accept($id)
    {
        $berkas = Berkas::findOrFail($id);

        $berkas->status_berkas = 2;
        $result = $berkas->save();

        if ($result != null) {
            return redirect()->route('berkas.index')->with('success', 'Data Berhasil di Update!');
        } else {
            return redirect()->route('berkas.index')->with('error', 'Data Gagal di Update!');
        }
    }

    public function reject($id)
    {
        $berkas = Berkas::findOrFail($id);

        $berkas->status_berkas = 1;
        $result = $berkas->save();

        if ($result != null) {
            return redirect()->route('berkas.index')->with('success', 'Data Berhasil di Update!');
        } else {
            return redirect()->route('berkas.index')->with('error', 'Data Gagal di Update!');
        }
    }

    public function pdf()
    {
        $pdf = PDF::loadView('sk.surat-keputusan')->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        $pdf->setPaper('Legal');
        return $pdf->stream('my.pdf', array('Attachment' => 0));
    }
}
