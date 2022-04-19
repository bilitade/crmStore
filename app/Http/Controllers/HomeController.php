<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {
        return view('dashboard.dash_view');
    }
public function  dashboard(){

   $orders=Order::where("store_id",Auth::Id())->get()->count();
   $categories=Category::where("store_id",Auth::Id())->get()->count();
   $products=Product::where("store_id",Auth::Id())->get()->count();
   $users=User::all()->count();



    return view('dashboard.dash_view')->with(['orders'=>$orders, 'categories'=>$categories,'products'=>$products, 'users'=>$users]);
}


}
