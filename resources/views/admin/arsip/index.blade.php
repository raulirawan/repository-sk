@extends('layouts.dashboard-admin')

@section('title', 'Halaman Arsip')

@section('content')
    <style>
        table .center {
            text-align: center;

        }

        td {
            height: 50px !important;
        }

    </style>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Arsip</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Arsip</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        @if (session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Data Arsip</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 15%">No Berkas</th>
                                            <th style="width: 20%">Nama Karyawan</th>
                                            <th style="width: 15%">Jabatan Baru</th>
                                            <th style="width: 15%">Unit Baru</th>
                                            <th style="width: 10%">Status</th>
                                            <th style="width: 12%">Opsi</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($berkas as $item)
                                            <tr>
                                                <td>{{ $item->nomor_berkas ?? '' }}</td>
                                                <td>{{ $item->user->name ?? '' }}</td>
                                                <td>{{ $item->mutasi->jabatan->name ?? '' }}</td>
                                                <td>{{ $item->mutasi->unit_baruu->name ?? '' }}</td>
                                                <td>
                                                    @if ($item->status_berkas == 0)
                                                        <span class="badge badge-warning">PENDING</span>
                                                    @elseif ($item->status_berkas == 1)
                                                        <span class="badge badge-danger">DITOLAK</span>
                                                    @else
                                                        <span class="badge badge-success">DISETUJUI</span>
                                                    @endif
                                                </td>
                                                <td class="text-center align-middle">
                                                    {{-- <a href="" class="btn btn-primary btn-xs"
                                                        style='float: left; margin-right: 10px'>Print <i
                                                            class="fa fa-print"></i></a> --}}
                                                    <a href="{{ route('berkas.pdf', $item->id) }}"
                                                        class="btn btn-primary btn-xs"
                                                        style='float: left; margin-right: 10px'>Print / PDF <i
                                                            class="fa fa-print"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>

                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@push('down-script')
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": false,
                "lengthChange": false,
                "autoWidth": false,
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": false,
                "info": false,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endpush
