@extends('layouts.header')

@section('title')Панель администратора@endsection

@section('content')

	<h1>Заказ №{{ $order->id }}</h1><br>

	@auth('admin')
		<h2>Информация о заказчике:</h2>

		<p>Заказчик - {{ $order->name }}</p>
		<p>Телефон - {{ $order->phone }}</p><br>

		<h2>Товары в заказе:</h2>

		<ol>
		@foreach($order->products as $el)
			<li><p>{{ $el->name }} ({{ $el->pivot->count }})</p></li>
		@endforeach
		</ol>

		<form action="{{ route('admin_index') }}" method="GET">
			<button type="submit" class="btn btn-success">Назад</button> 
		</form>
	@endauth

	@auth('web')
		<h2>Информация о вашем заказе:</h2>

		<p>Имя - {{ $order->name }}</p>
		<p>Телефон - {{ $order->phone }}</p><br>

		<h2>Товары в заказе:</h2>

		<ol>
		@foreach($order->products as $el)
			<li><p>{{ $el->name }} ({{ $el->pivot->count }})</p></li>
		@endforeach
		</ol>

		<form action="{{ route('person_orders_index') }}" method="GET">
			<button type="submit" class="btn btn-success">Назад</button> 
		</form>
	@endauth

@endsection