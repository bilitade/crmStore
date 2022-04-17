<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category=Category::paginate(5);

        return view("category.category_view")->with("categories", $category);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $valid = $request->validate([
            'name' => "required",


        ]);

        $slug=Str::slug($request['name']);
        Category::Create([
            "name"=>$request["name"],
            "slug"=>$slug


        ]);

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cate=Category::findorFail($id);
      return view('category.edit_category')->with("category", $cate);
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


        ]);
        $cate=Category::find($id);

        $slug=Str::slug($request['name']);
        $cate->update([
            "name"=>$request["name"],
            "slug"=>$slug


        ]);

        return back()
        ->with('success', 'You have successfully update.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

     $cate=Category::findorFail($request->id);
     $cate->delete();
     return back()
     ->with('success', 'You have successfully Deleted');
    }

}
