@extends('layouts.header')

@section('title')Корзина@endsection

@section('content')

	<h1>Корзина</h1><br>

	@foreach($order->products as $el)
		<h3>{{ $el->name }} ({{ $el->pivot->count }} шт.)</h3>
		<h5>{{ $el->description }}</h5>
		<p>Цена - {{ $el->price }} Рублей</p>
		<p>Стоимость - {{ $el->getPriceForCount() }} Рублей</p>

		<form action="{{ route('basket_add', $el->id) }}" method="POST">
			@csrf

			<button type="submit" class="btn btn-danger">Добавить</button>
		</form><br>

		<form action="{{ route('basket_remove', $el->id) }}" method="POST">
			@csrf

			<button type="submit" class="btn btn-danger">Убрать</button>
		</form><br>
	@endforeach
	
	<h2>Общая стоимость заказа - {{ $order->getFullPrice() }} Рублей</h3>

	<a href="{{ route('basket_place') }}" type="submit" class="btn btn-success">Перейти к оформлению заказа</a>

@endsection