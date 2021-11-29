<?php

namespace App\Http\Controllers\Admin;

use PDF;
use App\User;
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
        $berkas->keterangan = 'DISETUJUI';
        $result = $berkas->save();

        // update data user

        $karyawan = User::findOrFail($berkas->user_id);
        $karyawan->unit_id = $berkas->mutasi->unit_baru;
        $karyawan->jabatan_id = $berkas->mutasi->jabatan_id;
        $karyawan->save();

        if ($result != null) {
            return redirect()->route('berkas.index')->with('success', 'Data Berhasil di Update!');
        } else {
            return redirect()->route('berkas.index')->with('error', 'Data Gagal di Update!');
        }
    }

    public function reject(Request $request, $id)
    {
        $berkas = Berkas::findOrFail($id);

        $berkas->status_berkas = 1;
        $berkas->keterangan = $request->keterangan;
        $result = $berkas->save();

        if ($result != null) {
            return redirect()->route('berkas.index')->with('success', 'Data Berhasil di Update!');
        } else {
            return redirect()->route('berkas.index')->with('error', 'Data Gagal di Update!');
        }
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

    public function detail($id)
    {
        $item = Berkas::findOrFail($id);

        return view('admin.berkas.show', compact('item'));
    }
}
