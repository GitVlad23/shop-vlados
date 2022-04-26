@extends('layouts.header')

@section('title')Авторизация (Админ)@endsection

@section('content')

	<h1>Авторизация (Панель администратора)</h1>

	<form action="{{ route('admin_login_process') }}" method="POST">
		@csrf

		<input type="text" name="email" id="email" placeholder="Эл. почта"><br>
		<input type="password" name="password" id="password" placeholder="Пароль"><br><br>

		<button type="submit" class="btn btn-primary">Авторизоваться</button>
	</form>

@endsection