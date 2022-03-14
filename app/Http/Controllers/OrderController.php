<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Dish;
use App\Models\Dishorder;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function OrderView()
    {
        if(Session::get('1') == 0)
        {
            return redirect('cart');
        }
        $cartCount = Cart::where('user_id', Auth::id())->count();
        $carts = Cart::where('user_id', Auth::id())->get();
        $dishes = Dish::all(); 
        return view('order.order' , compact('carts' , 'dishes', 'cartCount'));
    }

    public function OrderPost(Request $request)
    {
        if($request->input('pay') == 1)
        {
           $d = 1;
        }
        else
        {
            $d = 2;
        }
        $data = [
            'user_id' => Auth::id(),
            'address' => "г. " . 'Челябинск' .", ул. ". $request->input('street') .", д. ". $request->input('house') .", кв. ". $request->input('apartment'),
            'totalprice' => Session::get('1') + 199,
            'status_id' => 1,
            'payStatus_id' => $d
        ];

        Order::create($data);
        $a = Cart::where('user_id', Auth::id())->get();
        $e = Order::all()->last();
        foreach($a as $b)
        {
            $data2 = [
                'user_id' => Auth::id(),
                'dish_id' => $b -> dish_id,
                'count' => $b -> count,
                'order_id' => $e -> id,
            ];
            Dishorder::create($data2);
            $b -> delete();
        }
        Session::remove('1');

        if($request->input('pay') == 1)
        {
            return redirect('accessOrder');
        }
        else
        return redirect('payment');
    }

    public function accessOrder()
    {
        return view('order.accessOrder');
    }

    public function payment()
    {
        return view('order.payment');
    }
}