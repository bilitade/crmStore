<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreFrontController extends Controller
{

    public function allstores(){

        $stores=Store::all();


          return view('storefront.home_view')->with('stores',$stores);
      }

    public function index($id){

      $products=Product::where('store_id','=', $id)->get();
      $categories=Category::where('store_id',"=" ,$id)->get();
      foreach($products as $item){

        $item->category;
      }
    //  dd($products);

        return view('storefront.product_view')->with(['products'=>$products, 'categories'=>$categories]);
    }

    public function productsByCategory ($storeid,$id){
     $products=Product::where('store_id',"=" ,$storeid)->where( 'category_id','=',$id)->get();

     $categories=Category::where('store_id',"=" ,$storeid)->get();
     foreach($products as $item){

       $item->category;
     }

     return view('storefront.product_view')->with(['products'=>$products, 'categories'=>$categories]);
    }

    public function categories($storeid, $Cslug){
        $categories=Category::where('store_id',"=" ,$storeid)->get();
        dd($categories);

       }
    public function category($storeid, $Cslug){
     $category=Category::where('store_id',"=" ,$storeid)->where( 'slug','=',$Cslug)->get();
     dd($category);

    }

    public function product($storeid, $Cslug){
        $category=Category::where('store_id',"=" ,$storeid)->where( 'slug','=',$Cslug)->get();
        dd($category);

       }
 public function singleProduct($id, $productslug){

    $product=Product::where('store_id',"=" ,$id)->where( 'slug','=',$productslug)->first();
    // dd($product);
    return view('storefront.item')->with('product',$product);

 }

}
