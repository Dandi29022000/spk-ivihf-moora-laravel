@extends('admin.layouts.app')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Master Tabel Linguistik</h1>
<a href="{{ route('linguistik.create') }}">
	<button type="button" class="btn btn-primary btn-toastr"><i class="fa fa-plus-square"></i> Tambah</button>
</a>
<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h5 class="m-0 font-weight-bold text-primary">Data Tabel Linguistik</h5>
	</div>

	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			<thead>
				<tr>
					<th>No.</th>
					<th>Nama</th>
					<th>Visualisasi HFLTS</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1; ?>
				@if($Linguistik->count() > 0)
				@foreach($Linguistik as $DU)
				<tr>
					<td>
						<?php
						echo $no++;
						?>
					</td>
					<td>{{ $DU->name }}</td>
					<td><img width="150px" src="{{asset('storage/'.$DU->image)}}" alt=""></td>
					<td>
						<form action="{{ route('user.destroy',$DU->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data user?')">
							<a id="button-edit" class="btn btn-info btn-circle" href="{{ route('user.edit',$DU->id) }}">
								<i class="fas fa-pencil-alt"></i>
							</a>
							
							@csrf
							@method('DELETE')
							<button class="btn btn-danger btn-circle" type="submit" class="btn btn-danger">
								<i class="fas fa-trash"></i>
							</button>
						</form>
					</td>
				</tr>
					@endforeach
					@else
				<tr>
					<td colspan="6">Data tidak tersedia</td>
				</tr>
					@endif
				</tbody>
			</table>
		</div>
	</div>
</div>

</div>
@endsection