@extends('layouts.add')

@section('title', 'Отзыв')

@section('content')
	<form class = "frm" action = "{{ route('feedback.add') }}" method = "post">
		@csrf 
		<span class="border text-center"> <h2>Введите отзыв</h2> </span> 
		<div style = "padding-left: 180px; padding-right: 180px">
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
			<div class="form-group">
				<label for="pwd">Отзыв </label>
				<input type="text" class="form-control" name = "feedback" required>
			</div>
		</div>
		<div class = "text-center">
			<button class = "btn btn-default" type = "submit" name="go">Отправить</button>
		</div>
	</form> 
@stop