@extends('admin.layouts.app')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Master Data Transaksi</h1>

    <div class="row justify-content-center">

        <div class="col-md-8">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary">Form Data Transaksi</h5>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('transaksi.store') }}">
                        @csrf
                        <div class="input-group">
                            <label for="tanggal" class="col-md-4 col-form-label text-md-end">{{ __('Tanggal') }}</label>
                            <input type="date" name="tanggal" class="form-control" id="tanggal" aria-describedby="tanggal" placeholder="dd-mm-yyyy" value="{{ old('tanggal') }}" min="1997-01-01" max=<?php echo date('Y-m-d'); ?>
                                placeholder="Pilih Tanggal">
                        </div>
                        <br>
                        <div class="input-group">
                            <label for="nama" class="col-md-4 col-form-label text-md-end">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama" aria-describedby="nama" placeholder="Nama" value="{{ old('nama') }}">
                        </div>
                        <br>
                        <div class="input-group">
                            <label for="keterangan" class="col-md-4 col-form-label text-md-end">Keterangan</label>
                            <input type="text" name="keterangan" class="form-control" id="keterangan" aria-describedby="keterangan" placeholder="Keterangan" value="{{ old('keterangan') }}">
                        </div>
                        <br>
                        <div class="input-group">
                            <label for="id_posisi" class="col-md-4 col-form-label text-md-end">{{ __('Posisi') }}</label>
                            <select name="id_posisi" id="id_posisi" class="form-control">
                                <option selected disabled>Pilih Posisi</option>
                                @foreach($PosisiPekerjaan as $pp)
                                    <option value="{{ $pp->id }}">{{ $pp->posisi }}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <div class="input-group">
                            <label for="id_penilai" class="col-md-4 col-form-label text-md-end">{{ __('Staf Penilai') }}</label>
                            <select name="id_penilai" id="id_penilai" class="form-control">
                            <option selected disabled>Pilih Staf</option>
                                @foreach($DataPeran as $d)
                                    <option value="{{ $d->id }}">{{ $d->data_peran_admin->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <div class="input-group">
                            <label for="id_pelamar" class="col-md-4 col-form-label text-md-end">{{ __('Karyawan yang Diseleksi') }}</label>
                            <select name="id_pelamar" id="id_pelamar" class="form-control">
                            <option selected disabled>Pilih Pelamar</option>
                                @foreach($DataPelamar as $dp)
                                    <option value="{{ $dp->id }}">{{ $dp->data_pelamar->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary btn-block">Simpan Data</button>
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-warning btn-block" onclick="kembali();">Cancel</button>
                            </div>
                        </div>
                    </form>
                        
                    <!-- Script -->
                    <script>
                        function kembali() {
                            window.location.href = "/admin/transaksi";
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection