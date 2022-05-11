<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>@yield('title')</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-dark text-white">

	<div class="d-flex flex-column flex-md-row align-items-center p-1 px-md-3 text-black" style="border-bottom: 2px solid brown; background-color: #b0284d;">
        <a href="/" class="p-1 text-black text-decoration-none" style="font-size: 30px;">Владос.ru</a>


        <div style="margin-left: 10%;">
        	<a href="{{ route('categories') }}" class="text-decoration-none text-black" style="font-size: 20px;">Категории</a>
        </div>

        <div style="margin-left: 2%;">
        	<a href="{{ route('basket') }}" class="text-decoration-none text-black" style="font-size: 20px;">Корзина</a>
        </div>

        <div style="margin-left: 2%;">
        	<a href="{{ route('person_orders_index') }}" class="text-decoration-none text-black" style="font-size: 20px;">Мои заказы</a>
        </div>


        <div class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
                @auth("web")
                    <div class="d-inline-flex mt-2 mt-md-0 ms-md-auto" style="margin-right: 15px;">
                        <a href="#" class="p-1 text-decoration-none text-black" style="font-size: 25px;">{{ auth('web')->user()->name; }}</a>
                    </div>
                @endauth

            <nav>
                @auth("web")
	                <div class="btn btn-warning" style="margin-top: 4px;">
	                    <a href="/auth/logout" class="p-2 text-black text-decoration-none">Выйти</a>
	                </div>
                @endauth

                @guest("web")

                	@if(Route::currentRouteName() == 'login')
                		<div class="btn btn-warning">
                			<a href="{{ route('admin_index') }}" class="p-2 text-black text-decoration-none">Панель администратора</a> |
		                    <a href="/auth/register" class="p-2 text-black text-decoration-none">Регистрация</a>
                		</div>
		            @elseif(Route::currentRouteName() == 'register')
		            	<div class="btn btn-warning">
		                    <a href="/auth/login" class="p-2 text-black text-decoration-none">Авторизация</a>
		                </div>
		            @elseif(Route::currentRouteName() == 'admin_login')
						<div class="btn btn-warning">
							<a href="{{ URL::previous() }}" class="p-2 text-black text-decoration-none">Обратно</a>
						</div> 
		            @else
	                	<div class="btn btn-warning">
		                    <a href="/auth/login" class="p-2 text-black text-decoration-none">Авторизация</a> |
		                    <a href="/auth/register" class="p-2 text-black text-decoration-none">Регистрация</a>
		                </div>
		            @endif
                @endguest
                </div>
            </nav>
        </div>
    </div>

	@yield('content')
</body>
</html>
