@extends('admin.layouts.app')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Master Tabel Linguistik</h1>

    <div class="row justify-content-center">

        <div class="col-md-8">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary">Form Input Tabel Linguistik</h5>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('linguistik.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nama') }}</label>
                            <input class="form-control" name="name" placeholder="Nama" type="text">
                        </div>
                        <br>
                        <div class="input-group">
                            <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Masukkan Foto') }}</label>
                            <input class="form-control" name="image" type="file">
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
                            window.location.href = "/admin/linguistik";
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection