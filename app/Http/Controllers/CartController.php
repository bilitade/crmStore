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
        //  dd($request->storeid);
       $cart= Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            "storeid"=>$request->storeid,
            "user"=>"1",
            'price' => $request->price,
            'quantity' => $request->quantity,

        ])

 ;

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
        session()->flash('success', 'Item Cart Removed Successfully !');

        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        Cart::clear();


        session()->flash('success', 'All Item Cart Cleared Successfully !');

        return redirect()->route('cart.list');
    }

    public function checkout(){
        $cartItems = Cart::getContent();
        return view('storefront.checkout', compact('cartItems'));
    }


    public function order(Request $request){

        // return $request->all();




      $store_id = intval( Cart::get(1)->storeid);

       $order=Order::Create([
       "customer"=>$request["name"],
       "store_id"=>$store_id,
       "status"=>"paid",
       "Address"=>$request["Address"],
       "phone"=>$request["phone"],
       "email"=>$request["email"],
       "totalPrice"=>Cart::getTotal(),


    ]);



        $cartCollection = Cart::getContent();
         foreach($cartCollection as $item){
          Item::Create([
           "order_id"=>$order->id,
           "product_id"=>$item->id,
           "quantity"=>$item->quantity,

          ]);

         }
         Cart::clear();


  return view('storefront.thanks')->with('orderid', $order->id);

    }
}
