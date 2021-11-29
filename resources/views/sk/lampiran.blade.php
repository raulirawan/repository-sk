<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @font-face {
            font-family: 'Calibri';
            font-weight: normal;
            font-style: normal;
            font-variant: normal;
        }

        body {
            font-family: Calibri, sans-serif;
        }

    </style>
</head>

<body>
    {{-- lampiran --}}
    <p>&nbsp;</p>
    <table style="height: 88px; width: 100%; border-collapse: collapse;" border="0">
        <tbody>
            <tr style="height: 16px;">
                <td style="width: 99.9999%; height: 16px; text-align: center;" colspan="3"><strong>PETIKAN</strong></td>
            </tr>
            <tr style="height: 18px;">
                <td style="width: 99.9999%; height: 18px; text-align: center;" colspan="3"><strong>DAFTAR LAMPIRAN
                        KEPUTUSAN</strong></td>
            </tr>
            <tr style="height: 18px;">
                <td style="width: 99.9999%; height: 18px; text-align: center;" colspan="3"><strong>DIREKSI PT JASA MARGA
                        (PERSERO) TBK</strong></td>
            </tr>
            <tr style="height: 18px;">
                <td style="width: 44.8327%; height: 18px; text-align: right;"><strong>NOMOR</strong></td>
                <td style="width: 4.11672%; height: 18px; text-align: center;"><strong>:</strong></td>
                <td style="width: 51.0505%; height: 18px;"><strong>{{ $berkas->nomor_berkas }}</strong></td>
            </tr>
            <tr style="height: 18px;">
                <td style="width: 44.8327%; height: 18px; text-align: right;"><strong>TANGGAL</strong></td>
                <td style="width: 4.11672%; height: 18px; text-align: center;"><strong>:</strong></td>
                <td style="width: 51.0505%; height: 18px;"><strong>{{ $berkas->updated_at->format('d F Y') }}</strong>
                </td>
            </tr>
        </tbody>
    </table>
    <p>&nbsp;</p>
    <table style="height: 247px; width: 100%; border-collapse: collapse;" border="1">
        <tbody>
            <tr style="height: 64px;">
                <td style="width: 6.70543%; height: 110px; text-align: center; vertical-align: middle;" rowspan="2">
                    <strong>NO</strong>
                </td>
                <td style="width: 43.2945%; text-align: center; height: 110px; vertical-align: middle;" rowspan="2">
                    <strong>NAMA</strong><br /><strong>NPP</strong>
                </td>
                <td style="width: 25%; text-align: center; height: 64px;" colspan="2"><strong>JABATAN</strong></td>
            </tr>
            <tr style="height: 46px;">
                <td style="width: 25%; text-align: center; height: 46px;"><strong>LAMA</strong></td>
                <td style="width: 25%; text-align: center; height: 46px;"><strong>BARU</strong></td>
            </tr>
            <tr style="height: 137px;">
                <td style="width: 6.70543%; text-align: center; vertical-align: middle; height: 137px;">
                    <strong>1.</strong>
                </td>
                <td style="width: 43.2945%; text-align: center; vertical-align: middle; height: 137px;">
                    <p style="text-align: left;"><strong>&nbsp;{{ $berkas->user->name }}
                        </strong><br /><strong>&nbsp;{{ $berkas->user->nip }}</strong></p>
                </td>
                <td style="width: 25%; text-align: center; height: 137px;">
                    <p><strong>{{ $berkas->mutasi->jabatan_lamaa->name }}<br />{{ $berkas->mutasi->unit_lamaa->name }}</strong>
                    </p>
                </td>
                <td style="width: 25%; text-align: center; height: 137px;">
                    <strong>{{ $berkas->user->jabatan->name }}<br />{{ $berkas->user->unit->name }}</strong>
                </td>
            </tr>
        </tbody>
    </table>
    <p>&nbsp;</p>
    <table style="width: 100%; border-collapse: collapse; height: 144px;" border="0">
        <tbody>
            <tr style="height: 18px;">
                <td style="width: 45.5039%; height: 18px;">&nbsp;</td>
                <td style="height: 18px; width: 54.496%; text-align: center;" colspan="3">Direksi PT Jasa Marga
                    (Persero) Tbk</td>
            </tr>
            <tr style="height: 18px;">
                <td style="width: 45.5039%; height: 18px;">&nbsp;</td>
                <td style="height: 18px; width: 54.496%; text-align: center;" colspan="3">&nbsp;</td>
            </tr>
            <tr style="height: 18px;">
                <td style="width: 45.5039%; height: 18px;">&nbsp;</td>
                <td style="height: 18px; text-align: center;" colspan="3">&nbsp;</td>
            </tr>
            <tr style="height: 18px;">
                <td style="width: 45.5039%; height: 18px;">&nbsp;</td>
                <td style="height: 18px; text-align: center;" colspan="3">&nbsp;</td>
            </tr>
            <tr style="height: 18px;">
                <td style="width: 45.5039%; height: 18px;">&nbsp;</td>
                <td style="height: 18px; text-align: center;" colspan="3">&nbsp;</td>
            </tr>
            <tr style="height: 18px;">
                <td style="width: 45.5039%; height: 18px;">&nbsp;</td>
                <td style="width: 54.496%; height: 18px; text-align: center;" colspan="3">&nbsp;</td>
            </tr>
            <tr style="height: 18px;">
                <td style="width: 45.5039%; height: 18px;">&nbsp;</td>
                <td style="height: 18px; width: 54.496%; text-align: center;" colspan="3">Enkky Santoso A.W</td>
            </tr>
            <tr style="height: 18px;">
                <td style="width: 45.5039%; text-align: center; height: 18px;">&nbsp;</td>
                <td style="width: 54.496%; height: 18px; text-align: center;" colspan="3">Direktur Human Capital &amp;
                    Transformasi</td>
            </tr>
        </tbody>
    </table>
</body>

</html>
