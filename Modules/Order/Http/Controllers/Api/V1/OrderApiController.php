<?php

namespace Modules\Order\Http\Controllers\Api\V1;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use Modules\Order\Entities\Order;
class OrderApiController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('order::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('order::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
         
            $validator = Validator::make($request->all(), [
            'first_name'=>'required|string|min:3',
            "last_name"=>'required|string|min:2',
            "phone_no"=>'required|numeric',
            "dilivary_address"=>"required",
            "pincode"=>"required|numeric",
           ]);

             if ($validator->fails()) {
             return response([
                        'message' => $validator->messages(),
                        'status_code'=> Response::HTTP_UNAUTHORIZED,
                    ]);
              } 
      
           $order = new Order ;
          $order->customer_id = $request->customer_id;
          $order->product_id = $request->product_id;
           $order->first_name = $request->first_name;
           $order->last_name = $request->last_name;
           $order->phone_no = $request->phone_no;
           $order->dilivary_address = $request->dilivary_address;
           $order->pincode = $request->pincode;
           $order->total_prise = $request->total_prise;
           $order->total_quantaty = $request->total_quantaty;
           $order->payment_mode = "COD";
           $order->payment_status = $order->payment_mode == "COD" ? '1' : '0';
           $order->save();

        //    $orderProduct=[
        //       $request->product_id => ["product_quantaty" => $request->product_quantaty]
        //    ];

        
        //    $order->product()->attach([
        //         1 => ['product_quantaty' => 2], // Product ID 1 with a quantity of 2
        //     ]);

          return response([
                'message' => 'Order Successfully Placed',
                'status_code'=> Response::HTTP_OK,
            ], 200);

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('order::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('order::edit');
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
