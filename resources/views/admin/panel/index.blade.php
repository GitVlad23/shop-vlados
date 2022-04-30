@extends('layouts.header')

@section('title')Панель администратора@endsection

@section('content')

	@auth('admin')
		<h1>Панель администратора</h1>

		<a href="{{ route('admin.categories.index') }}" type="submit" class="btn btn-success">Категории</a><br>
		<a href="{{ route('admin.products.index') }}" type="submit" class="btn btn-success">Товары</a><br><br>

		<form action="{{ route('main') }}" method="GET">
			<button type="submit" class="btn btn-primary">На главную</button>
		</form><br>

		<form action="{{ route('admin_logout') }}" method="GET">
			<button type="submit" class="btn btn-danger">Выйти</button>
		</form><br>
	@endauth

	@auth('web')
		<h1>Мои заказы</h1>

		<form action="{{ route('main') }}" method="GET">
			<button type="submit" class="btn btn-primary">На главную</button>
		</form><br>
	@endauth

	<h2>Все заказы:</h2>

	@foreach($orders as $el)
		<h4><a href="@auth('admin'){{ route('admin_order_show', $el->id) }}@endauth @auth('web'){{ route('person_order_show', $el->id) }}@endauth">Заказ №{{ $el->id }}</a></h4>
		<p>Имя заказчика: {{ $el->name }}</p>
		<p>Телефон заказчика: {{ $el->phone }}</p>
		<h1 style="border-top: 1px solid black; width: 50%;"></h1>
	@endforeach

@endsection