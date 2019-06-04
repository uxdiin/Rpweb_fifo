@extends('layouts.base')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit Category</title>
</head>
@section('content')
<body>
	<div class="card-body">
		Edit Category
		<form action="{{ route('user.categories.update',$category['id']) }}" method="post">
			@csrf
			@method('put')
				<br>
				<div class="form-group row">
						<label class="col-sm-2 col-form-label" for="name">Nama</label>
						<div class ="col-sm-10">
							<input type="text" class = "form-control" name="name" id="name" value="{{ $category['name'] }}">
						</div>
				</div>
				<tr>
					<td colspan="3"><button class = "btn btn-outline-primary" type="submit">Simpan</button></td>
				</tr>
			
		</form>
	</div>	
</body>
@endsection
</html>