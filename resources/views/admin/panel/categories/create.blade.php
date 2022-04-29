@extends('layouts.header')

@section('title')@isset($category)Редактор ({{ $category->name }})@elseНовая категория@endisset @endsection

@section('content')

	@isset($category)

		<h1>Редактирование категории "{{ $category->name }}"</h1>

		<form action="{{ route('admin.categories.index') }}" method="GET">
			<button type="submit" class="btn btn-primary">Обратно</button>
		</form><br><br>

		<form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
			@csrf
			@method('PUT')

			<input type="text" name="name" id="name" value="{{ $category->name }}"><br>
			<input type="text" name="code" id="code" 
			value="{{ $category->code }}"><br>
			<input type="text" name="description" id="description" value="{{ $category->description }}"><br><br>

			<button type="submit" class="btn btn-success">Сохранить</button>
		</form><br>

		<button href="{{ route('admin.categories.destroy', $category->id) }}" type="submit" class="btn btn-danger">Удалить</button>

	@else

		<h1>Новая категория</h1>

		<form action="{{ route('admin.categories.index') }}" method="GET">
			<button type="submit" class="btn btn-primary">Обратно</button>
		</form><br><br>

		<form action="{{ route('admin.categories.store') }}" method="POST">
			@csrf

			<input type="text" name="name" id="name" placeholder="Название"><br>
			<input type="text" name="code" id="code" placeholder="Кодовое имя"><br>
			<input type="text" name="description" id="description" placeholder="Описание"><br><br>

			<button type="submit" class="btn btn-success">Создать</button>
		</form>

	@endisset




@endsection