@extends('layouts.layout')

@section('title', 'Товары')

@section('content')
@if(Session::has('message'))
	<div class="alert alert-danger text-center" role="alert">
	  {{ Session::get('message') }}
	</div>
@endif
<div style = "padding-top: 60px ;padding-left:60px; padding-right:60px">
<table class="table text-center">
	<thead class="thead-dark">
		<th>Название</th>
		<th>Цена</th>
		<th>Количество</th>
		<th>Изображение</th>
		<th></th>
	</thead>
	<tbody>
			@foreach($products as $p)
			<form method="POST" action = "{{ route('cart.add') }}">
				@csrf 
				<input name="id" type="hidden" value="{{ $p->id }}">
				<input name="name" type="hidden" value="{{ $p->name }}">
				<input name="price" type="hidden" value="{{ $p->price }}">
				<input name="image" type="hidden" value="{{ $p->image }}">
				<tr>
					<td>
						<a href="{{ route('products.showproduct',['id'=>$p->id]) }}">
							{{ $p->name }}
						</a>
					</td>
					<td >{{ $p->price }}</td>
					<td><input name="quantity" type = "number" min=1 max=10 value=1></td>
					<td><img style="width:200px; height:auto;"src="{{ asset($p->image) }}"></td>
					<td><button type="submit">В корзину</button></td>		
				</tr>
			</form>
			@endforeach
	</tbody>
</table>
</div>
@stop