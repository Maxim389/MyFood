<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Dish;
use App\Models\Dishorder;
use App\Models\Order;
use App\Models\PayStatus;
use App\Models\Restaurant;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function signup()
    {
        return view('user.signup');
    }

    public function signupPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'phone' => 'required',
            'success' => 'required',
            'login' => 'required|unique:users',
            'password' => 'required|confirmed',
            'photo' => 'file|mimes:jpg,png,bmp|max:10240'
        ]);

        if(empty($request->photo))
        {
            $name_photo = 'avatar.png';
        }
        else{
            $name_photo = explode('/' , $request -> file('photo') -> store('public'))[1];
        }
        $data = [
            'photo' => $name_photo
        ];
        $request -> merge(['password' => Hash::make($request -> password)]);
        $data += $request -> only('name' , 'email' , 'phone' , 'password', 'login');
        User::create($data);
        return redirect('signin');
    }

    public function signin()
    {
        return view('user.signin');
    }

    public function signinPost(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);
        if(Auth::attempt($request->only('login', 'password')))
        {
            $request -> session() -> regenerate();
            return redirect('/');
        }
        return back()->withErrors(['error' => 'вы ввели неправильный логин или пароль']);
    }

    public function lk()
    {
        $carts = Dishorder::where('user_id', Auth::id())->get();
        $dishes = Dish::all();
        $orders = Order::where('user_id', Auth::id())->get();
        return view('user.lk', compact('orders' , 'dishes' , 'carts'));
    }

    public function admin()
    {
        $carts = Dishorder::all();
        $dishes = Dish::all();
        $orders = Order::all();
        $restaurant = Restaurant::all();
        return view('user.admin', compact('orders' , 'dishes' , 'carts', 'restaurant'));
    }

    public function logout()
    {
        Session::remove('1');
        Auth::logout();
        return redirect('signin');
    }

    public function profile()
    {
        return view('user.profile');
    }

    public function update()
    {
        return view('user.update');
    }

    public function updatePost(Request $request, User $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'login' => 'required',
            'photo' => 'file|mimes:jpg,png,bmp|max:10240'
        ]);
        $id -> name = $request->input('name');
        $id -> email = $request->input('email');
        $id -> login = $request->input('login');
        $id -> phone = $request->input('phone');
        if($request -> photo)
        {
            $id -> photo = explode('/' , $request -> file('photo')->store('public'))[1];
        }
        $id -> save();
        return redirect('profile');
    }

    public function updatePassword()
    {
        return view('user.updatePassword');
    }

    public function updatePasswordPost(Request $request, User $id)
    {
        $request->validate([
            'password' => 'required|confirmed',
        ]);
        $request -> merge(['password' => Hash::make($request -> input('password'))]);
        $id -> password = $request->input('password');
        $id -> save();
        return redirect('profile');
    }

    public function deleteOrderView()
    {
        return view('user.deleteOrder');
    }

    public function deleteOrderPost(Order $id)
    {
        Dishorder::where('order_id' , $id -> id) -> delete();
        $id -> delete();
        return redirect('lk');
    }

    public function updateOrderView(Order $id)
    {
        $pay = PayStatus::all();
        $statuses = Status::all();
        $orderpay = PayStatus::find($id->payStatus_id);
        $orderStatus = Status::find($id->status_id);
        return view('order.updateOrder' , compact('pay', 'orderpay', 'orderStatus', 'statuses'));
    }

    public function updateOrderPost(Request $request ,Order $id)
    {
        $id -> status_id = $request->input('status_id');
        $id -> payStatus_id = $request->input('payStatus_id');
        $id -> save();
        return redirect('admin');
    }


}
