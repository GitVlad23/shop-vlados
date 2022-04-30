@extends('layouts.header')

@section('title')@isset($product)Редактор ({{ $product->name }})@elseНовый товар@endisset @endsection

@section('content')

	@isset($product)

		<h1>Редактирование товара "{{ $product->name }}"</h1>

		<form action="{{ route('admin.products.index') }}" method="GET">
			<button type="submit" class="btn btn-primary">Обратно</button>
		</form><br><br>

		<form action="{{ route('admin.products.update', $product->id) }}" method="POST">
			@csrf
			@method('PUT')

			<input type="text" name="name" id="name" value="{{ $product->name }}"><br>
			<input type="text" name="code" id="code" 
			value="{{ $product->code }}"><br>
			<input type="text" name="description" id="description" value="{{ $product->description }}"><br>
			<input type="text" name="price" id="price" value="{{ $product->price }}"> Рублей<br>
			<select name="category_id" id="category_id" class="form-control">
				@foreach($categories as $el)
					<option value="{{ $el->id }}"
						@if($product->category_id == $el->id)
							selected
						@endif
						>{{ $el->name }}</option>
				@endforeach
			</select><br><br>

			<button type="submit" class="btn btn-success">Сохранить</button>
		</form><br>

		<button href="{{ route('admin.products.destroy', $product->id) }}" type="submit" class="btn btn-danger">Удалить</button>

	@else

		<h1>Новый товар</h1>

		<form action="{{ URL::previous() }}" method="GET">
			<button type="submit" class="btn btn-primary">Обратно</button>
		</form><br><br>

		<form action="{{ route('admin.products.store') }}" method="POST">
			@csrf

			<input type="text" name="name" id="name" placeholder="Название"><br>
			<input type="text" name="code" id="code" placeholder="Кодовое имя"><br>
			<input type="text" name="description" id="description" placeholder="Описание"><br>
			<input type="text" name="price" id="price" placeholder="Цена"> Рублей<br>
			<select name="category_id" id="category_id" class="form-control">
				@foreach($categories as $el)
					<option value="{{ $el->id }}"
						@if($categoryID == $el->id)
							selected
						@endif
						>{{ $el->name }}</option>
				@endforeach
			</select><br><br>

			<button type="submit" class="btn btn-success">Создать</button>
		</form>

	@endisset

@endsection