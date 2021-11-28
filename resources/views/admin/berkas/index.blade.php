@extends('layouts.dashboard-admin')

@section('title', 'Halaman Berkas')

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
                        <h1>Berkas</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Berkas</li>
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
                                <h3 class="card-title">Data Berkas</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 15%">No Berkas</th>
                                            <th style="width: 20%">Nama Karyawan</th>
                                            <th style="width: 15%">Unit Lama</th>
                                            <th style="width: 15%">Unit Baru</th>
                                            <th style="width: 10%">Status Berkas</th>
                                            <th style="width: 10%">Opsi</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($berkas as $item)
                                            <tr>
                                                <td>{{ $item->nomor_berkas ?? '' }}</td>
                                                <td>{{ $item->user->name ?? '' }}</td>
                                                <td>{{ $item->mutasi->unit_lamaa->name ?? '' }}</td>
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
                                                    @if ($item->status_berkas == 0)
                                                        <form action="{{ route('berkas.accept', $item->id) }}"
                                                            style='float: left; padding-left: 5px;' class="d-block"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit"
                                                                style="border: none; background: transparent"
                                                                onclick="return confirm('Yakin ?')"><i
                                                                    class="fa fa-check"></i></button>
                                                        </form>
                                                        <form action="{{ route('berkas.reject', $item->id) }}"
                                                            style='float: left; padding-left: 5px;' class="d-block"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit"
                                                                style="border: none; background: transparent"
                                                                onclick="return confirm('Yakin ?')"><i
                                                                    class="fa fa-times"></i></button>
                                                        </form>
                                                    @else

                                                    @endif
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
