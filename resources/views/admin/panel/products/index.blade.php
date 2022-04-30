@extends('layouts.header')

@section('title')Товары (админ)@endsection

@section('content')

	<h1>Товары</h1>

	<form action="{{ route('admin_index') }}" method="GET">
		<button type="submit" class="btn btn-primary">Обратно</button>
	</form><br>

	<form action="{{ route('admin.products.create.id') }}" method="GET">
		<button type="submit" class="btn btn-primary">Добавить новый товар</button>
	</form><br>

	<h2>Все товары:</h2>

	@foreach($products as $el)
		<a href="{{ route('admin.products.show', $el->id) }}"><p>Название - {{ $el->name }}</p></a>
		<p>Кодовое имя - {{ $el->code }}</p>
		<p>Описание - {{ $el->description }}</p>
		<p>Категория - {{ $el->category->name }}</p>
		<p>Цена - {{ $el->price }} Рублей</p>

		<form action="{{ route('admin.products.edit', $el->id) }}" method="GET">
			<button type="submit" class="btn btn-success">Редактировать</button>
		</form>

		<form action="{{ route('admin.products.destroy', $el->id) }}" method="POST">
			@csrf
			@method('DELETE')

			<button type="submit" class="btn btn-danger">Удалить</button>
		</form>
		<h1 style="border-top: 1px solid black; width: 50%;"></h1>
	@endforeach

@endsection