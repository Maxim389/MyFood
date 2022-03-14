<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Dish;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DishController extends Controller
{
    public function addDish()
    {
        $restaurants = Restaurant::all();
        return view('dish.addDish' , compact('restaurants'));
    }

    public function addDishPost(Request $request)
    {
        $request -> validate([
            'name' => 'required',
            'photo' => 'required|file|mimes:jpg,png,bmp|max:10240',
            'price' => 'required',
            'weight' => 'required',
            'restaurant_id' => 'required',
        ]);
        $name_photo = explode('/' , $request -> file('photo') -> store('public'))[1];
        $data = [
            'photo' => $name_photo
        ];
        $data += $request -> only('name' , 'price' , 'weight' , 'restaurant_id');
        Dish::create($data);
        return redirect('/');
    }

    public function DishList(Restaurant $id, Dish $d)
    {
        $dishes = Dish::where('restaurant_id', $id -> id)->get();
        return view('dish.dishList' , compact('dishes', 'id'));
    }

    public function DishListPost(Request $request)
    {
        $a = Cart::where('user_id', Auth::id())->where('dish_id', $request->input('data-name'))->first();
        if (Cart::where('user_id', Auth::id())->where('dish_id', $request->input('data-name'))->get()->count() > 0) {
            $a -> update(['count' => $a -> count + $request->input('count')]);
            return redirect('cart');
         }
         else{
            $data = [
                'dish_id' => $request->input('data-name'),
                'user_id' => Auth::id(),
            ];
            $data += $request -> only('count');
            Cart::create($data);
            return redirect('cart');
         }
    }

    public function dishUpdateView(Dish $id)
    {
        $restaurants = Restaurant::all();
        $restaurantid = Restaurant::find($id->restaurant_id);
        $dishes = Dish::where('id', $id -> id)->get();
        return view('dish.dishUpdate', compact('dishes', 'restaurantid', 'restaurants'));
    }

    public function dishUpdatePost(Request $request ,Dish $id)
    {
        $request -> validate([
            'name' => 'required',
            'photo' => 'file|mimes:jpg,png,bmp|max:10240',
            'price' => 'required',
            'weight' => 'required',
            'restaurant_id' => 'required',
        ]);
        $id -> name = $request->input('name');
        if($request -> photo)
        {
            $id -> photo = explode('/' , $request -> file('photo')->store('public'))[1];
        }
        $id -> restaurant_id = $request->input(('restaurant_id'));
        $id -> price = $request->input(('price'));
        $id -> weight = $request->input(('weight'));
        $id -> save();
        return redirect('admin');
    }

}
