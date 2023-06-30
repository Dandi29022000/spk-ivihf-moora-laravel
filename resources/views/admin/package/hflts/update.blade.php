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
                    <form action="{{ route('hflts.update', $hfltsLinguistik->id) }}" method="post">
                        @csrf
                        @method('PUT')
                            <div class="input-group">
                                <label for="id" class="col-md-4 col-form-label text-md-end">{{ __('Id') }}</label>
                                <input class="form-control" name="id" placeholder="Id" type="text" value="{{ $hfltsLinguistik->id }}" readonly>
                            </div>
                        <br>
                            <div class="input-group">
                                <label for="id_linguistik" class="col-md-4 col-form-label text-md-end">Linguistik</label>
                                <select name="id_linguistik" id="id_linguistik" class="form-control">
                                <option selected disabled>Pilih Linguistik</option>
                                @foreach($Linguistik as $l)
                                    <option value="{{ $l->id }}">{{ $l->name }}</option>
                                @endforeach
                                </select>
                            </div>
                        <br>
                            <div class="input-group">
                                <label for="A" class="col-md-4 col-form-label text-md-end">{{ __('A') }}</label>
                                <input class="form-control" name="A" placeholder="" type="text" value="{{ $hfltsLinguistik->A }}">
                            </div>
                        <br>
                        <div class="input-group">
                                <label for="B" class="col-md-4 col-form-label text-md-end">{{ __('B') }}</label>
                                <input class="form-control" name="B" placeholder="" type="text" value="{{ $hfltsLinguistik->B }}">
                            </div>
                        <br>
                        <div class="input-group">
                                <label for="C" class="col-md-4 col-form-label text-md-end">{{ __('C') }}</label>
                                <input class="form-control" name="C" placeholder="" type="text" value="{{ $hfltsLinguistik->C }}">
                            </div>
                        <br>
                        <div class="input-group">
                                <label for="D" class="col-md-4 col-form-label text-md-end">{{ __('D') }}</label>
                                <input class="form-control" name="D" placeholder="" type="text" value="{{ $hfltsLinguistik->D }}">
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