<?php

namespace App\Http\Controllers;

use App\Filters\ProductFilter;
use App\Filters\RestaurantsFilter;
use App\Models\Cart;
use App\Models\Restaurant;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function welcome(RestaurantsFilter $request)
    {
        $prod = Restaurant::all();
        $products = Restaurant::filter($request)->get();
        $restaurants = Restaurant::all();
        $tag = Tag::all();
        $img = User::all();
        return view('welcome' , compact('restaurants' , 'products', 'prod', 'tag'));
    }

    public function DeleteView()
    {
        return view('delete');
    }

    public function DeleteCartPost(Cart $id)
    {
        $id -> delete();
        return redirect('cart');
    }

    public function noaccessView()
    {
        return view('noaccess');
    }
}
