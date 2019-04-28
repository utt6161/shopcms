@extends('layouts.add')

@section('content')
	<form class = "frm" action = "{{ route('products.add') }}" method = "post" enctype="multipart/form-data">
		@csrf 
		<span class="border text-center"> <h2>Введите данные о часах: </h2> </span> 
		<div style = "padding-left: 180px; padding-right: 180px">
			<div class="form-group">
					<label for="usr">Название: </label>
					<input type="text" class="form-control" name = "name" required>
				</div>
			<div class="form-group">
				<label for="usr">Цена: </label>
				<input type="text" class="form-control" name = "price" required>
			</div>
			<div class="form-group">
				<label for="usr">Изображение: </label>
				<input type="file" class="form-control" name="img">
			</div>
		</div>
		<div class = "text-center">
			<button class = "btn btn-default" type = "submit" name="go">Добавить</button>
		</div>
	</form> 
@stop