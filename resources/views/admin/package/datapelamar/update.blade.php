@extends('admin.layouts.app')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Master Data Pelamar</h1>

    <div class="row justify-content-center">
        <div class="col-md-8">
        
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary">Form Update Data Pelamar</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('datapelamar.update', $DataPelamar->id) }}" method="post">
                        @csrf
                        @method('PUT')
                            <div class="input-group">
                                <label for="id" class="col-md-4 col-form-label text-md-end">{{ __('Id') }}</label>
                                <input class="form-control" name="id" placeholder="Id" type="text" value="{{ $DataPelamar->id }}" readonly>
                            </div>
                        <br>
                            <div class="input-group">
                                <label for="id_user" class="col-md-4 col-form-label text-md-end">Nama</label>
                                <select name="id_user" id="id_user" class="form-control">
                                <option selected disabled>Pilih User</option>
                                @foreach($User as $u)
                                    <option value="{{ $u->id }}">{{ $u->name }}</option>
                                @endforeach
                                </select>
                            </div>
                        <br>
                            <div class="input-group">
                                <label for="status" class="col-md-4 col-form-label text-md-end">{{ __('Status') }}</label>
                                <input class="form-control" name="status" placeholder="" type="text" value="{{ $DataPelamar->status }}">
                            </div>
                        <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary btn-block">Update Data</button>
                                </div>
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-warning btn-block" onclick="kembalidatapelamar();">Cancel</button>
                                </div>
                            </div>
                    </form>

                    <script>
                        function kembalidatapelamar() {
                            window.location.href = "/admin/datapelamar";
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection