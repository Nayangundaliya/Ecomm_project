<?php

namespace Modules\Category\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Category\Entities\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {  if($request->search){
       $category =Category::where("name" , 'LIKE', '%'.$request->search.'%')->get();
        return view('category::index',["category" => $category]);
    }
        $category =Category::all();

        return view('category::index',["category" => $category]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('category::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {  
        $request->validate([
             "name" => 'required',
             "slug" => 'required',
             'description' => 'required',
             "image" => "required|mimes:png,jpg|max:1024",
             'meta_title' => 'required',
             'meta_keyword' => 'required',
             'meta_description' => 'required',
        ]);
        $category = new Category;
        $category->name=$request->name;
        $category->slug=$request->slug;
        $category->description=$request->description;  
      if ($request->hasFile('image')) {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = 'category_image' . time() . ".$extension";

         $file->move('uploads/category/',$filename);
        $category->image=$filename;
      }

        $category->meta_title=$request->meta_title;
        $category->meta_keyword=$request->meta_keyword;
        $category->meta_description=$request->meta_description;
        $category->status= $request->status == "Active" ? "0" : "1" ;

         $category->save();

        session()->flash("massage", "Successfully Add Category");
            return redirect("/admin/category");
         
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
       // return view('category::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $category = Category::find($id);
       
        return view('category::edit',["category" => $category]);
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
             "name" => 'required',
             "slug" => 'required',
             'description' => 'required',
             "image" => "mimes:png,jpg|max:1024",
             'meta_title' => 'required',
             'meta_keyword' => 'required',
             'meta_description' => 'required',
        ]);
        $category =Category::find($id);
        $category->name=$request->name;
        $category->slug=$request->slug;
        $category->description=$request->description;  
      if ($request->hasFile('image')) {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = 'category_image' . time() . ".$extension";

         $file->move('uploads/category/',$filename);
        $category->image=$filename;
      }

        $category->meta_title=$request->meta_title;
        $category->meta_keyword=$request->meta_keyword;
        $category->meta_description=$request->meta_description;
        $category->status= $request->status == "Active" ? "0" : "1" ;

        $category->save();

        session()->flash("massage", "Successfully Edit Category");
            return redirect("/admin/category");
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        
        $delete = Category::findOrFail($id);
        $delete->delete();
        session()->flash("massage", "Successfully Delete Category");
        return redirect("/admin/category");
    }
}
