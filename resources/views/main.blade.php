@extends('layouts.header')

@section('title')Магазин Владос@endsection

@section('content')

	<h1>Главная страница</h1>

	@auth('web')
		<h2>Добро пожаловать, {{ $user->name }}!</h2>

		<h2><a href="{{ route('logout') }}">Выйти</a></h2>
		<h2><a href="{{ route('basket') }}">Корзина</a></h2><br>
	@endauth

	@guest('web')
		<div>
			<h2><a href="{{ route('login') }}">Войти</a></h2>
			<h2><a href="{{ route('register') }}">Регистрация</a></h2>
		</div><br>
	@endguest


	@if(session()->has('warning'))
		<p class="alert alert-success">{{ session()->get('warning') }}</p><br>
	@endif


	<h3><a href="{{ route('categories') }}">Категории</a></h3>

	<h2>Все товары:</h2>

	@foreach($products as $el)
		<h3>{{ $el->name }}</h3>
		<p>{{ $el->description }}</p>
		<p>{{ $el->price }} Рублей</p>

		<form action="{{ route('basket_add', $el->id) }}" method="POST">
			@csrf

			<button type="submit" class="btn btn-success">В корзину</button>
		</form><br>
	@endforeach
	
@endsection