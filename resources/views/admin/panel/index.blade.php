@extends('layouts.header')

@section('title')Панель администратора@endsection

@section('content')

	<h1>Панель администратора</h1>

	<a href="{{ route('admin.categories.index') }}" type="submit" class="btn btn-success">Категории</a><br>
	<a href="{{ route('admin.products.index') }}" type="submit" class="btn btn-success">Товары</a><br><br>

	<form action="{{ route('admin_logout') }}" method="GET">
		<button type="submit" class="btn btn-primary">Выйти</button>
	</form><br>

	<h2>Все заказы:</h2>

	@foreach($orders as $el)
		<p>Имя заказчика: {{ $el->name }}</p>
		<p>Телефон заказчика: {{ $el->phone }}</p><br>
	@endforeach

@endsection