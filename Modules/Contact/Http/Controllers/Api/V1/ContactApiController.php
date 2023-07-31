<?php

namespace Modules\Contact\Http\Controllers\Api\V1;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Modules\Contact\Entities\Contact;
use Mail;


class ContactApiController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('contact::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('contact::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|min:3',
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return response([
                'message' => $validator->messages(),
                'status' => 401
            ], 401);
        };

        $data = new Contact;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->message = $request->message;
        $data->save();

        $emaildata = [
            'name'=> $request->username,
            'email'=> $request->email,
            'subject'=> $request->message,
        ];

         $user_mail['to'] = $request->email;
        Mail::send('email.emails', $emaildata, function ($messages) use ($user_mail) {
            $messages->to($user_mail['to']);
            $messages->subject('Thank you');
        });

        Mail::send('email.email_adimn', $emaildata, function ($messages) use ($user_mail) {
            $messages->to('nayan10.pd@gmail.com');
            $messages->subject('Contact E-Commerce' . date('d/m/Y H:i'));
        });

        return response([
            'message' => 'Email Send Successfully',
            'status' => 200
        ], 201);
    }

    /**
     * Show the specified resource.
     *
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('contact::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('contact::edit');
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
