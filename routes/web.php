<?php
  
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;  
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();
  
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/buscar', [ProductController::class, 'buscar']);
  
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);    
    Route::get('/clock-example', [App\Http\Controllers\ExampleController::class, 'clock'])->name('clock.example');    
    Route::get('/calendar-example', [App\Http\Controllers\ExampleController::class, 'calendar'])->name('calendar.example');    

});
