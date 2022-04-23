@extends('layouts.header')

@section('title')Авторизация@endsection

@section('content')

	<h1>Авторизация</h1>

	<form action="{{ route('login_process') }}" method="POST">
		@csrf

		<input type="text" name="email" id="email" placeholder="Эл. почта"><br>
		<input type="password" name="password" id="password" placeholder="Пароль"><br><br>

		<button type="submit" class="btn btn-primary">Авторизоваться</button>
	</form>

@endsection