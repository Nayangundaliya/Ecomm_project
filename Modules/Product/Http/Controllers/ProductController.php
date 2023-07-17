<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Category\Entities\Category;
use Modules\Product\Entities\Product;
use Modules\Brand\Entities\Brand;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        if($request->search){
            $products =Product::where("name" , 'LIKE', '%'.$request->search.'%')->get();
            return view('product::index', compact('products'));
         }

        // $categories = Category::all();
        $products = Product::paginate(7);
        return view('product::index', compact('products'));
        $products = Category::with('products');
        return view('product::index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('product::addproduct', compact('categories','brands'));
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
            "image" => 'required|mimes:png,jpg|max:1024',
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
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = 'product_image' . time() . ".$extension";
    
             $file->move('uploads/product/',$filename);
            $data->image=$filename;
          }
        $data->small_description = $request->small_description;
        $data->description = $request->description;
        $data->original_price = $request->original_price;
        $data->selling_price = $request->selling_price;
        $data->quantity = $request->quantity;
        $data->trending = $request->trending == true ? '1':'0';
        $data->status = $request->status == true ? '1' : '0';
        $data->save();

        session()->flash("massage", "Successfully Add Product");
        return redirect('/admin/products');
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
        $categories = Category::all();
        $brands = Brand::all();
        $products = Product::find($id);
        return view('product::edit', compact('products','categories','brands'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required',
            "name" => 'required',
            "slug" => 'required',
            // "brand" => 'required',
            "image" => 'required|mimes:png,jpg|max:1024',
            // "small_description" => 'required',
            // "description" => 'required',
            "original_price" => 'required',
            "selling_price" => 'required',
            "quantity" => 'required',
        ]);
        // return $request->all();
        $data = Product::find($id);
        $data->category_id = $request->category_id;
        $data->name = $request->name;
        $data->slug = $request->slug;
        $data->brand = $request->brand;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = 'product_image' . time() . ".$extension";
    
             $file->move('uploads/product/',$filename);
            $data->image=$filename;
          }
        $data->small_description = $request->small_description;
        $data->description = $request->description;
        $data->original_price = $request->original_price;
        $data->selling_price = $request->selling_price;
        $data->quantity = $request->quantity;
        $data->trending = $request->trending == true ? '1':'0';
        $data->status = $request->status == true ? '1' : '0';
        $data->save();

        // return $data;

        session()->flash("massage", "Successfully Update Product");
        return redirect('/admin/products');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $delete = Product::findOrFail($id);
        $delete->delete();
        session()->flash("massage", "Successfully Delete Category");
        return redirect("/admin/products");
    }
}
