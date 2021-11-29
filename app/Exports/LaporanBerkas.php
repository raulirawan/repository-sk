<?php

namespace App\Exports;

use App\Berkas;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class LaporanBerkas implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;

    public function __construct($from_date,  $to_date, $status_berkas, $jenis)

    {
        $this->from_date = $from_date;
        $this->to_date = $to_date;
        $this->jenis = $jenis;
        $this->status_berkas = $status_berkas;
    }

    public function query()
    {
        $jenis = $this->jenis;
        // $from_date = $this->from_date;
        // $to_date = $this->to_date;
        // $status = $this->status_berkas;
        $data = Berkas::query()->where('status_berkas', $this->status_berkas)
            ->whereHas('mutasi', function ($mutasi) use ($jenis) {
                $mutasi->where('status', $jenis);
            })->whereRaw('created_at', [$this->from_date, $this->to_date]);
        return $data;
    }

    public function map($berkas): array
    {
        return [
            $berkas->nomor_berkas,
            $berkas->user->name,
            $berkas->user->nip,
            $berkas->mutasi->jabatan_lamaa->name,
            $berkas->mutasi->jabatan->name,
            $berkas->mutasi->unit_lamaa->name,
            $berkas->mutasi->unit_baruu->name,
            $berkas->mutasi->status,
            Carbon::parse($berkas->updated_at)->toFormattedDateString()
        ];
    }

    public function headings(): array
    {
        return [
            'Nomor Berkas',
            'Nama Karyawan',
            'NIP',
            'Jabatan Lama',
            'Jabatan Baru',
            'Unit Lama',
            'Unit Baru',
            'Status',
            'Tanggal',
        ];
    }
}
