<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Category\Entities\Category;
use Modules\Product\Entities\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('product::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $categories = Category::all();
        return view('product::addproduct', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            "name" => 'required',
            "slug" => 'required',
            "brand" => 'required',
            "small_description" => 'required',
            "description" => 'required',
            "original_price" => 'required',
            "selling_price" => 'required',
            "quantity" => 'required',
        ]);
        // return $request->all();
        $data = new Product;
        $data->category_id = $request->category_id;
        $data->name = $request->name;
        $data->slug = $request->slug;
        $data->brand = $request->brand;
        $data->small_description = $request->small_description;
        $data->description = $request->description;
        $data->original_price = $request->original_price;
        $data->selling_price = $request->selling_price;
        $data->quantity = $request->quantity;
        $data->trending = $request->trending == true ? '1':'0';
        $data->status = $request->status == true ? '1' : '0';
        // $data->save();

        return $data->id;
        // echo $data;
        // return redirect('/color')->with('success', 'Item created successfully!');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('product::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('product::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
