<?php
use App\Http\Controllers\Adminauth\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//admin login
Route::get('admin/login', [AdminController::class, 'login'])->name("login");
Route::get('test', function (){
    return view('test');
})->name("test");

Route::middleware('auth')->prefix("admin")->group(function () {
    
    //Change Password
    Route::get('/change-password', [AdminController::class, 'changePassword']);
    Route::post('/change-password', [AdminController::class,'updatePassword']);

    
     //Logout
    Route::get('/logout', [AdminController::class, 'logout']);
});
