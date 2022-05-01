@extends('layouts.header')

@section('title')Регистрация@endsection

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

		<h1 style="margin-left: 33%;">Регистрация</h1>

		</div>
	</div>
	

	<div style="
        margin: 0;
        position: absolute;
        top: 25%;
        transform: translate(27%, 27%);
        width: 650px;
        ">

		<form action="{{ route('register_process') }}" method="POST">
			@csrf

			<input type="text" name="name" id="name" placeholder="Имя" class="form-control"><br>
			<input type="text" name="email" id="email" placeholder="Эл. почта" class="form-control"><br>
			<input type="password" name="password" id="password" placeholder="Пароль" class="form-control"><br>
			<input type="password" name="password_confirmation" id="password_confirmation" placeholder="Подтвердите пароль" class="form-control"><br>

			<button type="submit" class="btn btn-primary">Зарегистрироваться</button>
		</form>
		
	</div>

@endsection