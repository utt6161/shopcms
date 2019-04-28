@extends('layouts.add')

@section('title', 'Товары')

@section('content')
<div style = "padding-top: 20px;">
	<div class = "text-center">
		<a class="btn btn-secondary btn-lg active" role="button" aria-pressed="true" href="{{ url('/admin/add_products') }}">Добавление товара</a>
		<a class="btn btn-secondary btn-lg active" role="button" aria-pressed="true" href="{{ url('/admin/del_products') }}">Удалить товар</a>
	</div>
</div>
<div style = "padding-top:15px; padding-left:60px; padding-right:60px">

	<table class="table text-center ">
	<thead class="thead-dark">
		<th>ID</th>
		<th>Название</th>
		<th>Цена</th>
		<th>Изображение</th>
	</thead>
	<tbody>
		@foreach($products as $p)
		<tr>
			<td>{{ $p->id }}</td>
			<td>
				<a href="{{ route('products.showproduct',['id'=>$p->id]) }}">
					{{ $p->name }}
				</a>
			</td>
			<td>{{ $p->price }}</td>
			<td><img style="width:200px; height:auto;" height:auto;" src="{{ asset($p->image) }}"></td>
		</tr>
		@endforeach
	</tbody>
</table>
</div>
@stop