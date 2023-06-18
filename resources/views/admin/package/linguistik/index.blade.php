@extends('admin.layouts.app')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Master Tabel Linguistik</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h5 class="m-0 font-weight-bold text-primary">Data Tabel Linguistik</h5>
	</div>

	<div class="card-body">
		<div class="row">
			<div class="col-lg-12 margin-tb">
				<div class="float-left my-2">
					<a href="{{ route('linguistik.create') }}">
						<button type="button" class="btn btn-success"><i class="fa fa-plus-square"></i> Tambah</button>
					</a>
				</div>


				<div class="float-right my-2">
					<div class="float-left">
						<form action="{{ route('linguistik.index') }}" method="GET" role="search">
						<div class="input-group">
								<a href="{{ route('linguistik.index') }}" class="mr-4 mt-1">
									<span class="input-group-btn">
										<button class="btn btn-danger" type="button" title="Refresh page">
											<span class="fas fa-sync-alt">Refresh</span>
										</button>
									</span>
								</a>
								
								<input type="text" class="form-control mr-4 mt-1" name="term" placeholder="Search" id="term">
								<span class="input-group-btn mr-2 mt-1">
									<input type="submit" value="Cari" class="btn btn-primary">
								</span>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			<thead>
				<tr>
					<th>ID</th>
					<th>Linguistik</th>
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
			{{ $Linguistik->links() }}

		</div>
	</div>
</div>

</div>
@endsection