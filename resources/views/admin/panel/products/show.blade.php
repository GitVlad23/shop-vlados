@extends('layouts.header')

@section('title')Товар "{{ $product->name }}"@endsection

@section('content')

	<h1>Категория - "{{ $product->name }}"</h1>

	<h3>Кодовое имя - "{{ $product->code }}"</h3>
	<h3>Описание - "{{ $product->description }}"</h3>
	<h3>Категория - "{{ $product->category->name }}"</h3>
	<h3>Цена - {{ $product->price }} Рублей</h3>

	<form action="{{ route('admin.products.index') }}" method="GET">
		<button type="submit" class="btn btn-primary">Обратно</button>
	</form>

@endsection