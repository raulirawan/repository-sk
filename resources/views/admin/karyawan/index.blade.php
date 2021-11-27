@extends('layouts.dashboard-admin')

@section('title', 'Halaman Karyawan')

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
                        <h1>Karyawan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Karyawan</li>
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
                                <h3 class="card-title">Data Karyawan</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <a href="{{ route('karyawan.create') }}" class="btn btn-primary mb-2">(+) Tambah
                                    Karyawan</a>

                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 15%">NIP</th>
                                            <th style="width: 25%">Nama</th>
                                            <th style="width: 5px">Jabatan</th>
                                            <th style="width: 5px">Foto</th>
                                            <th style="width: 10%">Opsi</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($karyawan as $item)
                                            <tr>
                                                <td>{{ $item->nip }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->jabatan->name }}</td>
                                                <td class="center">
                                                    <img src="{{ $item->profile_photo_url == null ? url('img/people.jpg') : Storage::url($item->profile_photo_url) }}"
                                                        style="max-width: 50px">
                                                </td>
                                                <td class="text-center align-middle">
                                                    <a href="{{ route('karyawan.show', $item->id) }}"
                                                        style='float: left; margin-right: 10px'><i class="fa fa-eye"
                                                            style="color:#000000"></i></a>
                                                    <a href="{{ route('karyawan.edit', $item->id) }}"
                                                        style='float: left;'><i class="fa fa-pencil-alt"
                                                            style="color:#000000"></i></a>
                                                    <form action="{{ route('karyawan.destroy', $item->id) }}"
                                                        style='float: left; padding-left: 5px;' method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" style="border: none; background: transparent"
                                                            onclick="return confirm('Yakin ?')"><i
                                                                class="fa fa-trash"></i></button>

                                                    </form>
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
