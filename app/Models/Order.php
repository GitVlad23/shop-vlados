<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class Order extends Model
{
    use HasFactory;

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('count')->withTimestamps();
    }

    public function getFullPrice()
    {
        $sum = 0;

        foreach($this->products as $product)
        {
            $sum += $product->getPriceForCount();
        }

        return $sum;
    }

    public function saveOrder($name, $phone)
    {
        if($this->status == 0)
        {
            $this->user_id = Auth::user()->id;
            $this->name = $name;
            $this->phone = $phone;
            $this->status = 1;
            $this->save();

            session()->forget('orderID');

            return true;
        } else
        {
            return false;
        }
    }
}
