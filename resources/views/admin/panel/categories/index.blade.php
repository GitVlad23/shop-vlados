@extends('layouts.header')

@section('title')Категории (админ)@endsection

@section('content')

	<h1>Категории</h1>

	<form action="{{ route('admin_index') }}" method="GET">
		<button type="submit" class="btn btn-primary">Обратно</button>
	</form><br>

	<form action="{{ route('admin.categories.create') }}" method="GET">
		<button type="submit" class="btn btn-primary">Создать новую категорию</button>
	</form><br>

	<h2>Все категории:</h2>

	@foreach($categories as $el)
		<a href="{{ route('admin.categories.show', $el->id) }}"><p>Название - {{ $el->name }}</p></a>
		<p>Кодовое имя - {{ $el->code }}</p>
		<p>Описание - {{ $el->description }}</p>

		<form action="{{ route('admin.categories.edit', $el->id) }}" method="GET">
			<button type="submit" class="btn btn-success">Редактировать</button>
		</form>

		<form action="{{ route('admin.categories.destroy', $el->id) }}" method="POST">
			@csrf
			@method('DELETE')

			<button type="submit" class="btn btn-danger">Удалить</button>
		</form><br>
	@endforeach

@endsection