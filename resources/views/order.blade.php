@extends('layouts.header')

@section('title')Заказ@endsection

@section('content')

	<h1>Подтверждение заказа</h1>


	<h2>Товары:</h2>

	@foreach($order->products as $el)
		<h4>{{ $el->name }} ({{ $el->pivot->count }})</h4>
	@endforeach


	<h2>Ваши данные:</h2>

	<form action="{{ route('basket_confirm') }}" method="GET">

		<h4>Имя - <input type="text" name="name" id="name" value="{{ $user->name }}"></h4>
		<h4>Телефон - <input type="text" name="phone" id="phone" placeholder="Телефон"></h4>

		<h2>Общая стоимость заказа - {{ $order->getFullPrice() }} Рублей</h2>

		<button type="submit" class="btn btn-success">Подтвердить заказ</button>
	</form>




@endsection