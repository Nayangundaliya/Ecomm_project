<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Category\Entities\Category;
use Modules\Product\Entities\Product;
use Modules\Brand\Entities\Brand;
use Modules\Product\Entities\ProductImage;
use App\Exports\ProductExport;
use PDF;
use Excel;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        if($request->search){
            $products =Product::where("name", 'LIKE', '%'.$request->search.'%')->get();
            return view('product::index', compact('products'));
            // $products = Product::where("brand", 'LIKE', '%' . $request->search . '%')->get();
            // return view('product::index', compact('products'));
         }

        // $categories = Category::all();
        $products = Product::paginate(8);
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
        // return $request->all();
        
        $request->validate([
            'category_id' => 'required',
            "name" => 'required',
            "slug" => 'required',
            "brand" => 'required',
            // "image" => 'required|mimes:png,jpg|max:1024',
            "small_description" => 'required',
            "description" => 'required',
            "replacement_days" => "required",
            "warranty_year" => "required",
            "original_price" => 'required',
            "selling_price" => 'required',
            "quantity" => 'required',
        ]);
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
        $data->replacement_days = $request->replacement_days;
        $data->warranty_year = $request->warranty_year;
        $data->original_price = $request->original_price;
        $data->selling_price = $request->selling_price;
        $data->quantity = $request->quantity;
        $data->trending = $request->trending == true ? '1':'0';
        $data->status = $request->status == true ? '1' : '0';
        $data->save();
        // echo $data->id;   

        if ($request->hasFile('images')) {

            foreach($request->file('images') as $imageFile){
                $image = new ProductImage;
                $image->product_id = $data->id;
                $extension = $imageFile->getClientOriginalExtension();
                $name = $imageFile->getClientOriginalName();
                $imageFile->move('uploads/product/', $name);
                $image->images = $name;
                $image->save();
            }
        }

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
            "brand" => 'required',
            // "image" => 'required|mimes:png,jpg|max:1024',
            // "small_description" => 'required',
            // "description" => 'required',
            "replacement_days" => 'required',
            "warranty_year" => 'required',
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
        $data->replacement_days = $request->replacement_days;
        $data->warranty_year = $request->warranty_year;
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

    public function exportpdf(){
        $products = Product::get();
        
        $pdf = PDF::loadView('productpdf', compact('products'));
        return $pdf->download('product.pdf');
    }

    public function exportcsv(){
        return Excel::download(new ProductExport, 'productdata.xlsx');
    }
}
