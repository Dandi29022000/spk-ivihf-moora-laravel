@extends('admin.layouts.app')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Master Data linguistik</h1>

    <div class="row justify-content-center">
        <div class="col-md-8">
        
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary">Form Update Data linguistik</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('linguistik.update', $Linguistik->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="input-group">
                            <label for="id" class="col-md-4 col-form-label text-md-end">{{ __('Id') }}</label>
                            <input class="form-control" name="id" placeholder="Id" type="text" value="{{ $Linguistik->id }}" readonly>
                        </div>
                        <br>
                            <div class="input-group">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                                <input class="form-control" name="name" placeholder="Name" type="text" value="{{ $Linguistik->name }}">
                            </div>
                        <br>
                        <div class="input-group">
                            <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Masukkan Foto') }}</label>
                            <input class="form-control" name="image" type="file" value="{{ $Linguistik->image }}">
                        </div>
                        <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary btn-block">Update Data</button>
                                </div>
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-warning btn-block" onclick="kembalilinguistik();">Cancel</button>
                                </div>
                            </div>
                    </form>

                    <script>
                        function kembalilinguistik() {
                            window.location.href = "/admin/linguistik";
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection