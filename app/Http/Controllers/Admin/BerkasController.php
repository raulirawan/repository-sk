<?php

namespace App\Http\Controllers\Admin;

use PDF;
use App\Berkas;
use iio\libmergepdf\Merger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

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
        $m = new Merger();

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('sk.surat-keputusan')
            ->setPaper('legal', 'portrait')
            ->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        $m->addRaw($pdf->output());

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('sk.lampiran')
            ->setPaper('legal', 'landscape')
            ->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        $m->addRaw($pdf->output());

        // ubah nanti SK-NIP
        $rand = mt_rand(0000, 9999);
        $fileName = 'surat-sk/SK-' . $rand . '.pdf';
        file_put_contents($fileName, $m->merge());

        return redirect($fileName);
    }
}
