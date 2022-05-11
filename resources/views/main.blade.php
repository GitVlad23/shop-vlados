@extends('layouts.header')

@section('title')Магазин Владос@endsection

@section('content')

	<div style="transform: translate(50%, 30%); width: 50%;">
    	@if(session()->has('success'))
			<p class="alert alert-success">{{ session()->get('success') }}</p><br>
		@endif
		@if(session()->has('warning'))
			<p class="alert alert-danger">{{ session()->get('warning') }}</p><br>
		@endif
	</div>

	<div style=".center; position: relative;">
        <div class="d-inline-flex flex-column flex-md-row align-items-center p-3 px-md-4" style="
        transform: translate(20%, 40%);
        border-bottom: 2px solid red;
        width: 70%;
        ">

		<h1 style="margin-left: 33%;">Рекомендуем</h1>

		</div>
	</div>


	<div style="
        margin: 0;
        transform: translate(10%, 15%);
        width: 90%;
        ">
		@foreach($products as $el)
		<div class="d-inline-flex flex-column flex-md-row align-items-center p-1 px-md-2" style="">
			<div class="alert alert-danger">
				<nav class="mt-2 mt-md-0 ms-md-auto" style="font-size: 15px;">
					<h3>{{ $el->name }}</h3>
					<p>{{ $el->category->name }}</p>

					<form action="{{ route('basket_add', $el->id) }}" method="POST">
					@csrf

					<button type="submit" class="btn btn-success" role="button">В корзину</button>
				</form>
				</nav>
			</div>
		</div>
		@endforeach
	</div>
	
@endsection