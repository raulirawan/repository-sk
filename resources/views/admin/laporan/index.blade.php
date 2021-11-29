@extends('layouts.dashboard-admin')

@section('title', 'Halaman Tambah laporan')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tambah laporan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Tambah laporan</li>
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
                            {{-- <div class="card-header">
                                <h3 class="card-title">Form Tambah laporan</h3>
                            </div> --}}
                            <!-- /.card-header -->
                            <form class="form-horizontal" action="{{ route('laporan.get') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Dari Tanggal</label>
                                                <input type="date" class="form-control" name="from_date"
                                                    id="exampleInputEmail1" placeholder="Enter email">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Sampai Tanggal</label>
                                                <input type="date" class="form-control" name="to_date"
                                                    id="exampleInputEmail1" placeholder="Enter email">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Status</label>
                                                <select name="status_berkas" id="status_berkas" class="form-control">
                                                    <option value="0">Pending</option>
                                                    <option value="1">Ditolak</option>
                                                    <option value="2">Disetujui</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Jenis</label>
                                                <select name="jenis" id="jenis" class="form-control">
                                                    <option value="Penugasan Sementara">Penugasan Sementara</option>
                                                    <option value="Mutasi">Mutasi</option>
                                                    <option value="Rotasi">Rotasi</option>
                                                    <option value="Promosi">Promosi</option>
                                                    <option value="Penempatan Karyawan Baru">Penempatan Karyawan Baru
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info">Download Laporan</button>
                                </div>
                                <!-- /.card-footer -->
                            </form>
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
