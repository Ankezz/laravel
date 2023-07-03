<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profilePage()
    {
        $user = User::where('id', Auth()->user()->id)->get();
        $order = Order::where('user_id',Auth()->user()->id)->get();
        return view('profile', ['users' => $user,'orders'=>$order]);
    }
}
