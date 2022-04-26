@extends('layouts.header')

@section('title')Панель администратора@endsection

@section('content')

	<h1>Панель администратора</h1>

	<h2>Все заказы:</h2>

	@foreach($orders as $el)
		<h3>{{ $el->name }}</h3>
		<p>{{ $el->phone }}</p><br>
	@endforeach

	<form action="{{ route('admin_logout') }}" method="GET">
		<button type="submit" class="btn btn-primary">Выйти</button>
	</form>

@endsection