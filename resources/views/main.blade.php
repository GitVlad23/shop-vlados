@extends('layouts.header')

@section('title')Магазин Владос@endsection

@section('content')

	<h1>Главная страница</h1>

	<h3><a href="{{ route('categories') }}">Категории</a></h3>

	<h2>Все товары:</h2>

	@foreach($products as $el)
		<h3>{{ $el->name }}</h3>
		<p>{{ $el->description }}</p>
		<p>{{ $el->price }} Рублей</p><br>
	@endforeach
	
@endsection