@extends('admin.layouts.app')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Master Tabel HFLTS - Linguistik</h1>

    <div class="row justify-content-center">

        <div class="col-md-8">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary">Form Input Tabel HFLTS - Linguistik</h5>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('hflts.store') }}">
                        @csrf
                        <div class="input-group">
                            <label for="id_linguistik" class="col-md-4 col-form-label text-md-end">{{ __('Linguistik') }}</label>
                            <select name="id_linguistik" id="id_linguistik" class="form-control">
                                <option selected disabled>Pilih Linguistik</option>
                                @foreach($Linguistik as $l)
                                    <option value="{{ $l->id }}">{{ $l->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <div class="input-group">
                            <label for="A" class="col-md-4 col-form-label text-md-end">A</label>
                            <input type="text" name="A" class="form-control" id="A" aria-describedby="A">
                        </div>
                        <br>
                        <div class="input-group">
                            <label for="B" class="col-md-4 col-form-label text-md-end">B</label>
                            <input type="text" name="B" class="form-control" id="B" aria-describedby="B">
                        </div>
                        <br>
                        <div class="input-group">
                            <label for="C" class="col-md-4 col-form-label text-md-end">C</label>
                            <input type="text" name="C" class="form-control" id="C" aria-describedby="C">
                        </div>
                        <br>
                        <div class="input-group">
                            <label for="D" class="col-md-4 col-form-label text-md-end">D</label>
                            <input type="text" name="D" class="form-control" id="D" aria-describedby="D">
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
                            window.location.href = "/admin/hflts";
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection