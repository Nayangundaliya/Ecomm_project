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

Route::middleware('auth')->prefix("admin")->group(function () {
        Route::get('/dashboard', function () {
           return view('dashboard::dashboard');
        });
        

        //Logout
    Route::get('/logout', [AdminController::class, 'logout']);
});
