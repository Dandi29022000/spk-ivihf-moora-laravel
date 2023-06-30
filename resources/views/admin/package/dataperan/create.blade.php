@extends('admin.layouts.app')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Master Data Peran Admin</h1>

    <div class="row justify-content-center">

        <div class="col-md-8">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary">Form Data Peran Admin</h5>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('dataperan.store') }}">
                        @csrf
                        <div class="input-group">
                            <label for="id_user" class="col-md-4 col-form-label text-md-end">{{ __('User') }}</label>
                            <select name="id_user" id="id_user" class="form-control">
                                <option selected disabled>Pilih User</option>
                                @foreach($User as $u)
                                    <option value="{{ $u->id }}">{{ $u->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <div class="input-group">
                            <label for="status" class="col-md-4 col-form-label text-md-end">Status</label>
                            <input type="text" name="status" class="form-control" id="status" aria-describedby="A">
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
                            window.location.href = "/admin/dataperan";
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection