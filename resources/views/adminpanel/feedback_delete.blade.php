@extends('layouts.add')

@section('title', 'Товары')

@section('content')
<form action = "{{ route('feedback.delete') }}" method = 'post'>
	@csrf
	<div style = "padding-top: 20px;">
		<div class = "text-center">
				<button type="submint" class="btn btn-secondary" >Удалить выбранные отзывы</button>
		</div>
	</div>
	<div style = "padding-top:15px; padding-left:60px; padding-right:60px">
	<table class="table text-center">
		<thead class="thead-dark">
			<th> </th>
			<th>Имя</th>
			<th>Email</th>
			<th>Телефон</th>
			<th>Отзыв</th>
		</thead>
		<tbody>
			@foreach($feedback as $f)
			<tr>
				<td><input type="checkbox" name="records[]" value = {{ $f->id }} /></td>
				<td>{{ $f->name }}</td>
				<td>{{ $f->email }}</td>
				<td>{{ $f->phone }}</td>
				<td>{{ $f->feedback }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	</div>
</form>
@stop