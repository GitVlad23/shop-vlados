@extends('layouts.header')

@section('title')@endsection

@section('content')

	<h1>Категория - @foreach($category as $el){{ $el->name }}@endforeach</h1><br>

	<h2>Товары:</h2>

	<div><ol>
		@foreach($products as $el)
			<li><h3>{{ $el->name }}</h3>
			<p>{{ $el->description }}</p>
			<p>{{ $el->price }} Рублей</p></li>
			<h1 style="border-top: 1px solid black; width: 50%;"></h1>
		@endforeach
	</ol></div>

@endsection