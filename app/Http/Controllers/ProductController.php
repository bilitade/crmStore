<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where("user_id", Auth::id() )->paginate(3);

        return view('product.product_view')->with('products', $products);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $category =Category::where("store_id",Auth::id())->get();

        return view('product.create_product')->with("categories" ,$category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         $store=Store::find(Auth::id());

         if(!$store)
         {
            return back()
            ->with('error', 'first  create store before adding product');
    }


        //  return dd($request->all());

        $valid = $request->validate([
            'name' => "required",
            'description' => "required",
            "price" => "required",
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();

        $request->image->move(public_path('uploads/product_image'), $imageName);
        $slug=Str::slug($request['name']);
        $categoryid = intval( $request['category'] );

        $post = Product::create([
            'name' => $valid['name'],
            'store_id' => Auth::id(),
            "slug"=>$slug,
            "status" => "active",
            "category_id" => $categoryid,
            'description' => $request["description"],
            'user_id' => Auth::id(),
            'price' => $request["price"],
            'image' => $imageName,

        ]);


        /*
            Write Code Here for
            Store $imageName name in DATABASE from HERE
        */

        return back()
            ->with('success', 'You have successfully created.');

    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)

    {


        $category =Category::where("store_id",Auth::id())->get();

        $product = Product::find($id);
        return view('product.edit_product')->with(["product"=> $product,'categories'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $valid = $request->validate([
            'name' => "required",
            'description' => "required",
            "price" => "required",
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


      $product=Product::findOrFail($id);
      $categoryid = intval( $request['category'] );

      $image_path = "uploads/product_image/" . $product->image;
      if (File::exists($image_path)) {
          //File::delete($image_path);
          File::delete($image_path);
      }

      $imageName = time() . '.' . $request->image->extension();

      $request->image->move(public_path('uploads/product_image'), $imageName);

      $post = $product->update([
        'name' => $valid['name'],
        'store_id' => 1,
        "status" => "active",
        "category_id" => $categoryid,
        'description' => $request["description"],
        'user_id' => Auth::Id(),
        'price' => $request["price"],
        'image' => $imageName,

    ]);



        return back()->with('success', 'Product successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {


        $id = $request->id;
        $product = Product::findOrFail($id);
        $image_path = "uploads/product_image/" . $product->image;
        if (File::exists($image_path)) {
            //File::delete($image_path);
            File::delete($image_path);
        }
        $product->delete();
        return back()->with('success', 'Product successfully Deleted.');
    }


}
