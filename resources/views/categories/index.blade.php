@extends('layouts.base')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		table td {
			width: 100px;
		}

		table td#aksi *{
			display: inline-block;
		}
	</style>
</head>
@section('content')
<body>
	<div class = "container">
		<div class="card-body">
			<a href="{{ route('user.categories.create') }}"><button class="btn btn-outline-primary" style="border-radius: 24px">Tambah</button></a>
			<br>
			<br>
			<table  class="table" width="50%">
				<tr>
					<th>ID</th>
					<th>NAMA</th>
					<th>AKSI</th>
				</tr>
				@foreach($categories as $category)
				<tr>
					<td>{{ $category['id'] }}</td>
					<td>{{ $category['name'] }}</td>
					<td id="aksi">
						<a href="{{ route('user.categories.edit',$category['id']) }}"><button class="btn btn-outline-secondary" style="border-radius: 24px">Edit</button></a>
						<form action="{{ route('user.categories.destroy', $category['id']) }}" method="post">
							@csrf
							@method('delete')
							<button class="btn btn-outline-danger" style="border-radius: 24px">Hapus</button>
						</form>
					</td>
				</tr>
				@endforeach
			</table>
		</div>
	</div>		
</body>
@endsection
</html>