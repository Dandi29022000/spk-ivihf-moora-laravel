@extends('employee.layouts.app')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Master Data User</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h5 class="m-0 font-weight-bold text-primary">Data User</h5>
	</div>

	<div class="card-body">
		<div class="row">
			<div class="col-lg-12 margin-tb">

				<div class="float-left my-2">
					<div class="float-left">
						<form action="{{ route('user.index') }}" method="GET" role="search">
							<div class="input-group">
								<a href="{{ route('user.index') }}" class="mr-4 mt-1">
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
					<th>No.</th>
					<th>Nama Lengkap</th>
					<th>Email</th>
					<th>Level</th>
					<th>Alamat</th>
					<th>Tanggal Lahir</th>
					<th>Jenis Kelamin</th>
					<th>Foto</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1; ?>
				@if($User->count() > 0)
				@foreach($User as $DU)
				<tr>
					<td>
						<?php
						echo $no++;
						?>
					</td>
					<td>{{ $DU->name }}</td>
					<td>{{ $DU->email }}</td>
					<td>{{ $DU->level }}</td>
					<td>{{ $DU->alamat }}</td>
					<td>{{ $DU->tanggal_lahir }}</td>
					<td>{{ $DU->jenis_kelamin }}</td>
					<td><img width="90px" src="{{asset('storage/'.$DU->gambar)}}" alt=""></td>
					<td>

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