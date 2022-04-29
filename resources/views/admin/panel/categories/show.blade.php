@extends('layouts.header')

@section('title')Категория "{{ $category->name }}"@endsection

@section('content')

	<h1>Категория - "{{ $category->name }}"</h1>

	<h3>Кодовое имя - "{{ $category->code }}"</h3>
	<h3>Описание - "{{ $category->description }}"</h3>

	<form action="{{ route('admin.categories.index') }}" method="GET">
		<button type="submit" class="btn btn-primary">Обратно</button>
	</form>

@endsection