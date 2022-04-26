<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class PanelController extends Controller
{
    public function index()
    {
        $orders = Order::where('status', 1)->get();

        return view('/admin/panel/index', compact('orders'));
    }
}
