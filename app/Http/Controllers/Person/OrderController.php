<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Auth::user()->orders()->where('status', 1)->get();

        return view('/admin/panel/index', compact('orders'));
    }

    public function show(Order $order)
    {
        if(!Auth::user()->orders->contains($order))
        {
            return back();
        }

        return view('/admin/panel/show', compact('order'));
    }
}
