@extends('layouts.add')
@section('title', 'Заказы')
@section('content')
	<form class = "frm" action = "{{ route('orders.addaction') }}" method = "post">
		@csrf 
		<span class="border text-center"> <h2>Ваш заказ:</h2> </span> 
		<div style = "padding-top: 60px ;padding-left:60px; padding-right:60px">
			<table class="table text-center">
				<thead class="thead-dark">
					<th>Название</th>
					<th>Цена</th>
					<th>Изображение</th>
				</thead>
				<tbody>
				<tr>
					<td >
						<a>
							{{ $data->name }}
						</a>
					</td>
					<td >{{ $data->price }}</td>
					<td><img style="width:200px; height:auto;"src="{{ asset($data->image) }}"></td>			
				</tr>
			</tbody>
			</table>
		</div>
		<hr>
		<span class="border text-center"> <h2>Введите ваши данные:</h2> </span> 
		<div style = "padding-left: 180px; padding-right: 180px">
			<input type="hidden" class="form-control" name = "watchids" value={{ $data->id }}>
			<div class="form-group">
				<label for="usr">Имя: </label>
				<input type="text" class="form-control" name = "name" required>
			</div>
			<div class="form-group">
				<label for="pwd">Email </label>
				<input class="form-control" type="email" name = "email" required>
			</div>
			<div class="form-group">
				<label for="pwd">Номер телефона </label>
				<input type="text" class="form-control" name = "phone" required>
			</div>
		</div>
		<div class = "text-center">
			<button class = "btn btn-default" type = "submit" name="go">Отправить</button>
		</div>
	</form> 
@stop