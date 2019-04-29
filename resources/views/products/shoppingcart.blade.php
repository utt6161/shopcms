@extends('layouts.add')

@section('title', 'Корзина')

@section('content')
@if(Session::has('message'))
	<div class="alert alert-danger text-center" role="alert">
	  {{ Session::get('message') }}
	</div>
@endif
<div style = "padding-top: 20px;">
	<form class = "frm" action = "{{ route('cart.proceed') }}" method = "post" enctype="multipart/form-data">
		@csrf 
		<div class = "text-center">
			<button type="submit" class="btn btn-secondary">Оформить заказ</button>
		</div>
	</form>
</div>
<div style = "padding-top: 20px;">
	<form class = "frm" action = "{{ route('cart.clear') }}" method = "post" enctype="multipart/form-data">
		@csrf 
		<div class = "text-center">
			<button type="submit" class="btn btn-secondary">Очистить</button>
		</div>
	</form>
</div>
<div style = "padding-top:15px; padding-left:60px; padding-right:60px">
	<table class="table text-center ">
	<thead class="thead-dark">
		<th>ID</th>
		<th>Название</th>
		<th>Цена</th>
		<th>Количество</th>
		<th>Изображение</th>
		<th></th>
	</thead>
	<tbody>
		 
		@foreach($cart as $c)
			<form class = "frm" action = "{{ route('cart.delete') }}" method = "post" enctype="multipart/form-data">
			@csrf
			<input name="id" type="hidden" value="{{ $c->id }}">
			<tr>
				<td>{{ $c->id }}</td>
				<td>
					<a href="{{ route('products.showproduct',['id'=>$c->id]) }}">
						{{ $c->name }}
					</a>
				</td>
				<td>{{ $c->price }}</td>
				<td>{{ $c->quantity }}</td>
				<td><img style="width:200px; height:auto; height:auto;" src="{{ asset($c->attributes->image) }}"></td>
				<td><button type="submit" class="btn btn-secondary">Х</button></td>
			</tr>
			</form>
		@endforeach
	</tbody>
	</table>
</div>
@stop