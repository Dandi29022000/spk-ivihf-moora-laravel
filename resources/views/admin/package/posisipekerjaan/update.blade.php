@extends('admin.layouts.app')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Master Data Posisi Pekerjaan</h1>

    <div class="row justify-content-center">
        <div class="col-md-8">
        
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary">Form Update Data Posisi Pekerjaan</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('posisipekerjaan.update', $PosisiPekerjaan->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="input-group">
                            <label for="id" class="col-md-4 col-form-label text-md-end">{{ __('Id') }}</label>
                            <input class="form-control" name="id" placeholder="Id" type="text" value="{{ $PosisiPekerjaan->id }}" readonly>
                        </div>
                        <br>
                            <div class="input-group">
                                <label for="posisi" class="col-md-4 col-form-label text-md-end">{{ __('Posisi') }}</label>
                                <input class="form-control" name="posisi" placeholder="Posisi" type="text" value="{{ $PosisiPekerjaan->posisi }}">
                            </div>
                        <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary btn-block">Update Data</button>
                                </div>
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-warning btn-block" onclick="kembaliposisipekerjaan();">Cancel</button>
                                </div>
                            </div>
                    </form>

                    <script>
                        function kembaliposisipekerjaan() {
                            window.location.href = "/admin/posisipekerjaan";
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection