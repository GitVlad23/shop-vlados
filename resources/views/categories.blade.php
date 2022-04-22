@extends('layouts.header')

@section('title')Категории@endsection

@section('content')

	<h1>Категории:</h1>

	@foreach($categories as $el)
		<h3><a href="{{ route('category', $el->id) }}">{{ $el->name }}</a></h3>
	@endforeach

@endsection