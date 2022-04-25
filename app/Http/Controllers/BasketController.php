<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;

class BasketController extends Controller
{
    public function basket()
    {
        $orderID = session('orderID');

        if(!is_null($orderID))
        {
            $order = Order::findOrFail($orderID);
        }

        return view('basket', compact('order'));
    }

    public function basket_place()
    {

    }

    public function basket_add($productID)
    {
        $orderID = session('orderID');

        if(is_null($orderID))
        {
            $order = Order::create()->id;
            session(['orderID' => $order]);
        } else
        {
            $order = Order::find($orderID);
        }

        if($order->products->contains($productID))
        {
            $pivotRow = $order->products()->where('product_id', $productID)->first()->pivot;
            $pivotRow->count++;
            $pivotRow->update();
        } else
        {
            $order->products()->attach($productID);
        }

        return redirect()->route('basket');
    }

    public function basket_remove($productID)
    {
        $orderID = session('orderID');

        if(is_null($orderID))
        {
            return redirect()->route('basket');
        }

        $order = Order::find($orderID);

        if($order->products->contains($productID))
        {
            $pivotRow = $order->products()->where('product_id', $productID)->first()->pivot;

            if($pivotRow->count < 2)
            {
                $order->products()->detach($productID);
            } else
            {
                $pivotRow->count--;
                $pivotRow->update();
            }
        }

        return redirect()->route('basket');
    }
}
