@extends('layouts.header')

@section('title')Магазин Владос@endsection

@section('content')

	<h1>Главная страница</h1>

	@auth('web')
		<h2>Добро пожаловать, {{ $user->name }}!</h2>

		<div>
			<h2><a href="{{ route('logout') }}">Выйти</a></h2>
			<h2><a href="{{ route('basket') }}">Корзина</a></h2>
			<h2><a href="{{ route('person_orders_index') }}">Мои заказы</a></h2>
		</div><br>
	@endauth

	@auth('admin')
		<h2>Вы зашли за Администратора.</h2>

		<div>
			<h2><a href="{{ route('admin_index') }}">Панель админиcтратора</a></h2>
			<h2><a href="{{ route('admin_logout') }}">Выйти</a></h2>
		</div><br>
	@endauth

	@if(!auth('admin')->user())
		@guest('web')
			<div>
				<h2><a href="{{ route('login') }}">Войти</a></h2>
				<h2><a href="{{ route('register') }}">Регистрация</a></h2>
			</div><br>
		@endguest
	@endif


	@if(session()->has('success'))
		<p class="alert alert-success">{{ session()->get('success') }}</p><br>
	@endif

	@if(session()->has('warning'))
		<p class="alert alert-success">{{ session()->get('warning') }}</p><br>
	@endif


	<h3><a href="{{ route('categories') }}">Категории</a></h3>

	<h2>Все товары:</h2>

	@foreach($category as $i)
	<div>
		<h2>{{ $i->name }}</h2>

		@foreach($i->products as $el)
			<h4>{{ $el->name }}</h4>
			<p>{{ $el->description }}</p>
		@endforeach
	</div>

	<h1 style="border-top: 1px solid black; width: 50%;"></h1>
	@endforeach
	
@endsection