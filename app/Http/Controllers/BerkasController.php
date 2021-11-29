<?php

namespace App\Http\Controllers;

use App\Berkas;
use iio\libmergepdf\Merger;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BerkasController extends Controller
{
    public function index()
    {
        $berkas = Berkas::with(['user', 'mutasi'])
            ->orderBy('created_at', 'desc')
            ->where('user_id', Auth::user()->id)
            ->get();
        return view('karyawan.berkas.index', compact('berkas'));
    }

    public function detail($id)
    {
        $item = Berkas::findOrFail($id);

        return view('karyawan.berkas.show', compact('item'));
    }

    public function pdf($id)
    {
        $berkas = Berkas::findOrFail($id);

        $m = new Merger();

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('sk.surat-keputusan', compact('berkas'))
            ->setPaper('legal', 'portrait')
            ->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        $m->addRaw($pdf->output());

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('sk.lampiran', compact('berkas'))
            ->setPaper('legal', 'landscape')
            ->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        $m->addRaw($pdf->output());

        // ubah nanti SK-NIP
        $nama = $berkas->user->name . '-';
        $date = $berkas->updated_at->format('d F Y');
        $fileName = 'surat-sk/SK-' . $nama . $date . '.pdf';
        file_put_contents($fileName, $m->merge());

        return redirect($fileName);
    }
}
