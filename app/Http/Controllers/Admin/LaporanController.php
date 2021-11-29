<?php

namespace App\Http\Controllers\Admin;

use App\Berkas;
use App\Exports\LaporanBerkas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        return view('admin.laporan.index');
    }

    public function getLaporan(Request $request)
    {

        $from_date = $request->from_date;
        $to_date = $request->to_date;

        $status_berkas = $request->status_berkas;
        $jenis = $request->jenis;

        // $data = Berkas::query()->where('status_berkas', $status_berkas)
        //     ->whereHas('mutasi', function ($mutasi) use ($jenis) {
        //         $mutasi->where('status', $jenis);
        //     })->whereRaw('created_at', [$from_date, $to_date])->get();




        // dd($data);
        return (new LaporanBerkas($from_date, $to_date, $status_berkas, $jenis))->download('Laporan-Berkas-SK.xlsx');
        // return (new LaporanBerkas($from_date))->download('Laporan-Berkas-SK.xlsx');
    }
}
