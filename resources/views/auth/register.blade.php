@extends('layouts.header')

@section('title')Регистрация@endsection

@section('content')

	<h1>Регистрация</h1>

	<form action="{{ route('register_process') }}" method="POST">
		@csrf

		<input type="text" name="name" id="name" placeholder="Имя"><br>
		<input type="text" name="email" id="email" placeholder="Эл. почта"><br>
		<input type="password" name="password" id="password" placeholder="Пароль"><br>
		<input type="password" name="password_confirmation" id="password_confirmation" placeholder="Подтвердите пароль"><br><br>

		<button type="submit" class="btn btn-primary">Зарегистрироваться</button>
	</form>

@endsection