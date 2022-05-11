@extends('layouts.header')

@section('title')Категории@endsection

@section('content')

    <div style=".center; position: relative;">
        <div class="d-inline-flex flex-column flex-md-row align-items-center p-3 px-md-4" style="
        margin: 0;
        position: absolute;
        top: 10%;
        transform: translate(20%, 40%);
        border-bottom: 2px solid red;
        width: 70%;
        ">

		<h1 style="margin-left: 35%;">Категории</h1>

		</div>
	</div>


	<div style="
        margin: 0;
        position: absolute;
        top: 25%;
        transform: translate(20%, 40%);
        width: 80%;
        ">
		@foreach($categories as $el)
		<div class="d-inline-flex flex-column flex-md-row align-items-center p-1 px-md-2">
			<div class="alert alert-danger">
				<nav class="mt-2 mt-md-0 ms-md-auto" style="font-size: 35px;">
					<h3><a href="{{ route('category', $el->id) }}" class="text-decoration-none" style="color: black">{{ $el->name }}</a></h3>
				</nav>
			</div>
		</div>
		@endforeach
	</div>

@endsection