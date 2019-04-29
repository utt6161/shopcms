@extends('layouts.add')

@section('title', 'Товары')

@section('content')
<div style = "padding-top: 20px;">
	<div class = "text-center">
		<a class="btn btn-secondary btn-lg active" role="button" aria-pressed="true" href="{{ url('/admin/del_orders') }}">Удаление заказа</a>
	</div>
</div>
<div style = "padding-top:15px; padding-left:60px; padding-right:60px">
<table class="table text-center">
	<thead class="thead-dark">
		<th>ID часов</th>
		<th>Название</th>
		<th>Цена</th>
		<th>Количество</th>
        <th>Имя</th>
        <th>Email</th>
        <th>Номер телефона</th>
	</thead>
	<tbody>
		@foreach($orders as $o)
		<tr>
            <td>{{ $o->id }}</td>
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
@stop