@extends('layouts.add')

@section('title', 'Удаление заказов')

@section('content')
<form action = "{{ route('orders.delete') }}" method = 'post'>
	@csrf
	<div style = "padding-top: 20px;">
		<div class = "text-center">
				<button type="submint" class="btn btn-secondary" >Удалить выбранные заказы</button>
		</div>
	</div>
	<div style = "padding-top:15px; padding-left:60px; padding-right:60px">
	<table class="table text-center">
		<thead class="thead-dark">
			<th> </th>
			<th>ID часов</th>
			<th>Имя</th>
            <th>Email</th>
            <th>Номер телефона</th>
		</thead>
		<tbody>
			@foreach($orders as $o)
			<tr>
				<td><input type="checkbox" name="records[]" value = {{ $o->id }} /></td>
				<td>{{ $o->product_name }}</td>
				<td>{{ $o->price }}</td>
				<td>{{ $o->quantity }}</td>
				<td>{{ $o->name }}</td>
            	<td>{{ $o->email }}</td>
            	<td>{{ $o->phone }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	</div>
</form>
@stop