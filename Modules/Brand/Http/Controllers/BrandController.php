<?php

namespace Modules\Brand\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Brand\Entities\Brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    { if($request->search){
       $brand =Brand::where("name" , 'LIKE', '%'.$request->search.'%')->get();
        return view('brand::index',["brand" => $brand]);
    }
        $brand =Brand::all();

        return view('brand::index',["brand" => $brand]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('brand::create');
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
        ]);
        $brand = new Brand;
        $brand->name=$request->name;
        $brand->slug=$request->slug;
        $brand->status= $request->status == "Active" ? "0" : "1" ;

         $brand->save();

        session()->flash("massage", "Successfully Add Brand");
            return redirect("/admin/brand");
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
      //  return view('brand::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
          $brand = Brand::find($id);
       
        return view('brand::edit',["brand" => $brand]);
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
        ]);
        $brand =Brand::find($id);
        $brand->name=$request->name;
        $brand->slug=$request->slug;
        $brand->status= $request->status == "Active" ? "0" : "1" ;

        $brand->save();

        session()->flash("massage", "Successfully Edit Brand");
            return redirect("/admin/brand");
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
         $delete = Brand::findOrFail($id);
        $delete->delete();
        session()->flash("massage", "Successfully Delete Brand");
        return redirect("/admin/brand");
    }
}
