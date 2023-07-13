<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
     public function login()
    {       
        
        return view('login');
    }

    public function changePassword(){
        return view('changePassword');
    }
    public function updatePassword(Request $r)
    {
        
        //Get the current user
        $user = auth()->user();

        // Validate the new password
        $validatedData = request()->validate([
            'current_password' => ['required', 'string', 'min:8'],
            'new_password' => ['required', 'string', 'min:8'],
            'password_confirmation' => 'required_with:new_password|same:new_password',
        ]);
        // Check if the current password is correct
        if (!Hash::check($validatedData['current_password'], $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }

        // Update the password
        $update = User::find($user->id);
        $update->password = Hash::make($validatedData['new_password']);
        $update->update();
        session()->invalidate();
        session()->flash("massage", "Password Change Successfully");
        return redirect("/login");
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        Auth::logout();
        
        session()->flash("massage", "Successfully Logout");
        return redirect("admin/login");
    }
}
