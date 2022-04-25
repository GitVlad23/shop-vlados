@extends('layouts.header')

@section('title')@endsection

@section('content')

	<h1>Категория - @foreach($category as $el){{ $el->name }}@endforeach</h1>

	<h2>Товары:</h2>

	@foreach($products as $el)
		<h3>{{ $el->name }}</h3>
		<p>{{ $el->description }}</p>
		<p>{{ $el->price }}</p><br>
	@endforeach

@endsection