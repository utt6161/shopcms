@extends('layouts.layout')
@section('title','Главная')
@section('script')
@stop
@section("header_panel")
<main role="main">
<section class="jumbotron text-center">
	<div class="container-center">
		<h1 class="jumbotron-heading" style="color:white">"Часовщик"</h1>
		<p class="lead" style="color:white">
			Прямиком из Швейцарии
		</p>
	</div>
</section>
</main>
@stop

@section('content')
<div class = "text-center" style = "padding-left:60px; padding-right:60px">
	<h3 style = "color:white; padding-bottom:15px">Предложение ограничено!</h4>
    <div class="container">
        <div class="row" style = "justify-content: center">
            @foreach($products as $p)
				<div class="col-4">
				<form method="POST" action = "{{ route('cart.add') }}">
				@csrf 
                    <img src="{{ asset($p->image) }}" class="card-img-top" style = "width: 150px; height: 200px" alt="{{ $p->name }}">
                    <div class="card-body">
						<input name="id" type="hidden" value="{{ $p->id }}">
						<input name="name" type="hidden" value="{{ $p->name }}">
						<input name="price" type="hidden" value="{{ $p->price }}">
						<input name="image" type="hidden" value="{{ $p->image }}">
						<input name="quantity" type="hidden" value=1>
                        <a href="{{ route('products.showproduct',['id'=>$p->id]) }}">
						{{ $p->name }}
						</a>
                        <p class="card-text lead">{{ $p->price }} rub.</p>
                        <button type="submit">В корзину</button>
                    </div>
				</form>
                </div>
            @endforeach
        </div>
    </div>
</div>
@stop

@section('carousel1')

@endsection
