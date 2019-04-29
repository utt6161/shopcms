@extends('layouts.layout')
@section('title', 'Данные о товаре')
@section('content')
		<div class="text-center">
		<h3 style = "color:white">Данные о товаре</h3>
			<img src="{{ asset($products->image) }}" class="card-img-top" style = "width: 350px;" alt="{{ $products->name }}">
			<div class="card-body">
				<p>{{ $products->name }}</p>
				<p class="card-text lead">{{ $products->price }} rub.</p>
			</div>
		</div>
@stop