@extends('layouts.add')

@section('title', 'Товары')

@section('content')
<form action = "{{ route('products.delete') }}" method = 'post'>
	@csrf
	<div style = "padding-top: 20px;">
		<div class = "text-center">
				<button type="submint" class="btn btn-secondary" >Удалить выбранные товары</button>
		</div>
	</div>
	<div style = "padding-top:15px; padding-left:60px; padding-right:60px">
	<table class="table text-center">
		<thead class="thead-dark">
			<th></th>
			<th>ID</th>
			<th>Название</th>
			<th>Цена</th>
			<th>Изображение</th>
		</thead>
		<tbody>
			@foreach($products as $w)
			<tr>
				<tr>
					<td><input type="checkbox" name="records[]" value = {{ $w->id }} /></td>
					<td>{{ $w->watchid }}</td>
					<td>
						<a href="{{ route('products.products',['id'=>$w->id]) }}">
							{{ $w->name }}
						</a>
					</td>
					<td>{{ $w->price }}</td>
					<td><img style="width:200px; height:auto;" src="{{ asset($w->image) }}"></td>
				</tr>
			</tr>
			@endforeach
		</tbody>
	</table>
	</div>
</form>
@stop