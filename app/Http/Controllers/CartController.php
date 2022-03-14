<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Dish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cartView()
    {
        $carts = Cart::where('user_id', Auth::id())->get();
        $dishes = Dish::all();
        return view('cart.cart', compact('carts', 'dishes'));
    }

    public function CartPost(Request $request)
    {
        $a = Cart::where('user_id', Auth::id())->where('dish_id', $request->input('data-name'))->first();
        $a -> update(['count' => $a -> count + $request->input('count')]);
    }

}
