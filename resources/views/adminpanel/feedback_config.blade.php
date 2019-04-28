@extends('layouts.add')

@section('title', 'Товары')

@section('content')
<div style = "padding-top: 20px;">
	<div class = "text-center">
		<a class="btn btn-secondary btn-lg active" role="button" aria-pressed="true" href="{{ url('/admin/del_feedback') }}">Удаление отзывов</a>
	</div>
</div>
<div style = "padding-top:15px; padding-left:60px; padding-right:60px">
<table class="table text-center">
	<thead class="thead-dark">
		<th>Имя</th>
		<th>Email</th>
		<th>Телефон</th>
		<th>Отзыв</th>
	</thead>
	<tbody>
		@foreach($feedback as $f)
		<tr>
			<td>{{ $f->name }}</td>
			<td>{{ $f->email }}</td>
            <td>{{ $f->phone }}</td>
            <td>{{ $f->feedback }}</td>
		</tr>
		@endforeach
	</tbody>
</table>
</div>
@stop