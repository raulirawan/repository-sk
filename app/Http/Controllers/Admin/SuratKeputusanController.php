<?php

namespace App\Http\Controllers\Admin;

use App\Unit;
use App\User;
use App\Berkas;
use App\Mutasi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SuratKeputusanController extends Controller
{
    public function index()
    {
        $mutasi = Mutasi::with(['user.jabatan','user', 'unit_lamaa', 'unit_baruu'])->get();
        return view('admin.surat-keputusan.index', compact('mutasi'));
    }

    public function create()
    {
        $karyawan = User::where('roles', 'KARYAWAN')->get();
        $unit = Unit::all();
        return view('admin.surat-keputusan.create', compact('karyawan', 'unit'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'unit_lama' => 'required',
            'unit_baru' => 'required',
            'status' => 'required|string',
            'keterangan' => 'required|string',
        ]);

        if ($request->unit_lama == $request->unit_baru) {
            return redirect()->back()->with('alert', 'Unit Lama dan Unit Baru Tidak Boleh Sama!');
        } else {
            $data = $request->all();

            $mutasi = Mutasi::create($data);

            $nomor_berkas = 'SK/';


            $ps     =   Berkas::with(['mutasi', 'user'])->whereHas('mutasi', function ($mutasi) {
                $mutasi->where('status', 'Penugasan Sementara');
            })->count();

            $rt     =   Berkas::with(['mutasi', 'user'])->whereHas('mutasi', function ($mutasi) {
                $mutasi->where('status', 'Rotasi');
            })->count();

            $pr     =   Berkas::with(['mutasi', 'user'])->whereHas('mutasi', function ($mutasi) {
                $mutasi->where('status', 'Promosi');
            })->count();

            $pkb     =   Berkas::with(['mutasi', 'user'])->whereHas('mutasi', function ($mutasi) {
                $mutasi->where('status', 'Penempatan Karyawan Baru');
            })->count();

            $year = date('Y');
            if ($request->status == 'Penugasan Sementara') {
                $numRow = $ps + 1;
                if ($numRow < 10) {
                    $nomor_berkas = 'SK/00' . $numRow . '/EA.P-6a/' . $year . '';
                } else if ($numRow >= 10 && $numRow <= 99) {
                    $nomor_berkas = 'SK/0' . $numRow . '/EA.P-6a/' . $year . '';
                } else if ($numRow <= 100) {
                    $nomor_berkas = 'SK/' . $numRow . '/EA.P-6a/' . $year . '';
                }
            } else if ($request->status == 'Rotasi') {
                $numRow = $rt + 1;
                if ($numRow < 10) {
                    $nomor_berkas = 'SK/00' . $numRow . '/EA.P-6b/' . $year . '';
                } else if ($numRow >= 10 && $numRow <= 99) {
                    $nomor_berkas = 'SK/0' . $numRow . '/EA.P-6b/' . $year . '';
                } else if ($numRow <= 100) {
                    $nomor_berkas = 'SK/' . $numRow . '/EA.P-6b/' . $year . '';
                }
            } else if ($request->status == 'Promosi') {
                $numRow = $pr + 1;
                if ($numRow < 10) {
                    $nomor_berkas = 'SK/00' . $numRow . '/EA.P-6c/' . $year . '';
                } else if ($numRow >= 10 && $numRow <= 99) {
                    $nomor_berkas = 'SK/0' . $numRow . '/EA.P-6c/' . $year . '';
                } else if ($numRow <= 100) {
                    $nomor_berkas = 'SK/' . $numRow . '/EA.P-6c/' . $year . '';
                }
            } else {
                $numRow = $pkb + 1;
                if ($numRow < 10) {
                    $nomor_berkas = 'SK/00' . $numRow . '/EA.P-6d/' . $year . '';
                } else if ($numRow >= 10 && $numRow <= 99) {
                    $nomor_berkas = 'SK/0' . $numRow . '/EA.P-6d/' . $year . '';
                } else if ($numRow <= 100) {
                    $nomor_berkas = 'SK/' . $numRow . '/EA.P-6d/' . $year . '';
                }
            }

            $berkas = [
                'user_id' => $mutasi->user_id,
                'mutasi_id' => $mutasi->id,
                'nomor_berkas' => $nomor_berkas,
                'status_berkas' => 0,
            ];

            $dataBerkas = Berkas::create($berkas);
            if ($dataBerkas != null) {
                return redirect()->route('surat.keputusan.index')->with('success', 'Data Berhasil di Simpan!');
            } else {
                return redirect()->route('surat.keputusan.index')->with('error', 'Data Gagal di Simpan!');
            }
        }
    }
}
