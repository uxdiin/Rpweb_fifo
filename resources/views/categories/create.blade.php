@extends('layouts.base')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Create Category</title>
</head>
@section('content')
<body>
	<div class = "card-body">
		<div class="container">
			Add Categories
			<form action="{{ route('user.categories.store') }}" class="" method="post">
				@csrf
					<div class="form-group row">
							<label class="col-sm-2 col-form-label" for="name">Nama</label>
							<div class="col-sm-10">
									<input class = "form-control" type="text" name="name" id="name" placeholder="nama...">
							</div>	
					</div>
					<tr>
						<td colspan="3"><button class = "btn btn-outline-secondary" type="submit">Simpan</button></td>
					</tr>		
			</form>
		</div>	
	</div>	
</body>
@endsection
</html>