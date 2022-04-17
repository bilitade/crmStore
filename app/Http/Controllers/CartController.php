<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\Product;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Http\Request;


class CartController extends Controller
{


    public function cartList()
    {
        $cartItems = Cart::getContent();
        // dd($cartItems);
        return view('storefront.cart_view', compact('cartItems'));
    }

    public function index(){

        $products=Product::all();
        return view('storefront.home_view')->with("products", $products);
    }

    public function addToCart(Request $request)
    {
        Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
            )
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect()->route('cart.list');
    }

    public function updateCart(Request $request)
    {
        Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        session()->flash('success', 'Item Cart is Updated Successfully !');

        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        Cart::remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('cart.list');
    }

    public function checkout(){
        $cartItems = Cart::getContent();
        return view('storefront.checkout', compact('cartItems'));
    }


    public function order(Request $request){

        // return $request->all();





    $order=Order::Create([
       "customer"=>$request["name"],
       "store_id"=>1,
       "status"=>"paid",


    ]);



        $cartCollection = Cart::getContent();
         foreach($cartCollection as $item){
          Item::Create([
           "order_id"=>$order->id,
           "product_id"=>$item->id,
           "quantity"=>$item->quantity,

          ]);

         }



  return view('storefront.thanks')->with('orderid', $order->id);

    }
}
