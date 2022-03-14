<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\Tag;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function addRestaurant()
    {
        $tags = Tag::all();
        return view('Restaurant.addRestaurant', compact('tags'));
    }

    public function addRestaurantPost(Request $request)
    {
        $request -> validate([
            'name' => 'required',
            'photo' => 'required|file|mimes:jpg,png,bmp|max:10240',
            'tag_id' => 'required',
        ]);
        $name_photo = explode('/' , $request -> file('photo') -> store('public'))[1];
        $data = [
            'photo' => $name_photo
        ];
        $data += $request -> only('name', 'tag_id');
        Restaurant::create($data);
        return redirect('/');
    }

    public function addTag()
    {
        return view('Restaurant.addTag');
    }

    public function addTagPost(Request $request)
    {
        $request -> validate([
            'name' => 'required',
        ]);
        Tag::create($request -> all());
        return redirect('/');
    }

    public function updateRestaurantView(Restaurant $id)
    {
        $restaurant = Restaurant::where('id', $id -> id)->get();
        $tags = Tag::all();
        $restaurantTag = Tag::find($id->tag_id);
        return view('Restaurant.updateRestaurant' , compact('restaurant' , 'tags' , 'restaurantTag'));
    }

    public function updateRestaurantPost(Request $request, Restaurant $id)
    {
        $request -> validate([
            'name' => 'required',
            'photo' => 'file|mimes:jpg,png,bmp|max:10240',
            'tag_id' => 'required',
        ]);
        $id -> name = $request->input('name');
        if($request -> photo)
        {
            $id -> photo = explode('/' , $request -> file('photo')->store('public'))[1];
        }
        $id -> tag_id = $request->input(('tag_id'));
        $id -> save();
        return redirect('admin');
    }



}
