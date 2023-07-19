<?php

namespace Modules\Customer\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Customer\Entities\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
          if($request->search){
       $customer =Customer::where("first_name" , 'LIKE', '%'.$request->search.'%')->get();
        return view('customer::index',["customer" => $customer]);
        }
        $customer =Customer::all();

        return view('customer::index',["customer" => $customer]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('customer::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('customer::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
          $customer = Customer::find($id);
       
        return view('customer::edit',["customer" => $customer]);
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
            'first_name'=>'required',
            "last_name"=>'required',
            "country"=>'required',
            "phone_no"=>'required',
        ]);
        $customer =Customer::find($id);
        $customer->first_name=$request->first_name;
        $customer->last_name=$request->last_name;
        $customer->country=$request->country; 
        $customer->city=$request->city;  
        $customer->phone_no=$request->phone_no;

        $customer->status= $request->status == "Active" ? "0" : "1" ;

        $customer->save();

        session()->flash("massage", "Successfully Edit Customer");
            return redirect("/admin/customer");
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
          $delete = Customer::findOrFail($id);
        $delete->delete();
        session()->flash("massage", "Successfully Delete Customer");
        return redirect("/admin/customer");
    }
}
