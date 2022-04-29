<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Order;

class BasketIsNotEmpty
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $orderID = session('orderID');

        if(!is_null($orderID))
        {
            $order = Order::findOrFail($orderID);

            if($order->products->count() > 0)
            {
                return $next($request);
            }
        }

        session()->flash('warning', 'Your basket is empty!');
        return redirect()->route('main');
    }
}
