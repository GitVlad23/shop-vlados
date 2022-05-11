@extends('layouts.header')

@section('title')Корзина@endsection

@section('content')

	<div style=".center; position: relative;">
        <div class="d-inline-flex flex-column flex-md-row align-items-center p-3 px-md-4" style="
        transform: translate(12%, 40%);
        border-bottom: 2px solid red;
        width: 80%;
        ">
<div style="margin-top: 2%;">
        <div style="position: absolute; border-right: 2px solid red; width: 21%; margin-left: 5%;">
			<h1>Корзина</h1>
		</div>

		<div style="margin-left: 38%; width: 120%;">
			<h1 style="margin-left: 5%; margin-top: 6px; font-size: 30px;">Общая стоимость: {{ $order->getFullPrice() }} Рублей</h1>
		</div>
</div>
		</div>
	</div>


	<div style="
		margin-top: 5%;  
        transform: translate(12%, 2%);
        width: 80%;
        ">

		<div class="alert alert-danger">
			<h3><ol>
	    	   	@foreach($order->products as $el)
		    	   	<li style="border-bottom: 1px solid; height: 45px; margin-top: 10px">
		    	   		<div class="d-inline-flex" style="width: 100%;">
		    	   			<div>
		    	   				<h3>{{ $el->name }}</h3>
		    	   			</div>

		    	   			<div style="position: absolute; margin-left: 72%; margin-top: 5px;">
			    		   		<h5>{{ $el->pivot->count }} шт.</h5>
			    		   	</div>

			    		   	<div class="d-inline-flex" style="position: absolute; margin-left: 82%; transform: translate(0%, -5%);">
								<form action="{{ route('basket_add', $el->id) }}" method="POST">
									@csrf

									<button type="submit" class="btn btn-success">+</button>
								</form>

								<form action="{{ route('basket_remove', $el->id) }}" method="POST">
									@csrf

									<button type="submit" class="btn btn-danger">-</button>
								</form>
			    		   	</div>
			    	   </div>
			    	</li>
		    	@endforeach
			</ol></h3>
		</div>

		<div style="border-top: 2px solid red; width: 100%; margin-top: 18px;">
			<div style="margin-top: 2%;">
				<a href="{{ route('basket_place') }}" type="submit" class="btn btn-primary">Перейти к оформлению заказа</a>
			</div>
		</div>
	</div>


@endsection