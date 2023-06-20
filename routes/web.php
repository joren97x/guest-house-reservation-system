<?php

use App\Models\GuestHouses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\GuestHouseController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\WishlistController;
use App\Models\Wishlist;

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

// Common Resource Routes:
// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Store new listing
// edit - Show form to edit listing
// update - Update listing
// destroy - Delete listing  


Route::post('/payment/confirm', [ReservationController::class, 'store']);
Route::delete('/dashboard/reservation/delete', [ReservationController::class, 'delete']);

Route::get('/dashboard', [HomeController::class, 'index']);
Route::get('/dashboard/reservations', [HomeController::class, 'show']);

Route::post('/wishlist/save', [WishlistController::class, 'store']);
Route::delete('/wishlist/unsave',[WishlistController::class, 'destroy']);
Route::get('/wishlist', [WishlistController::class, 'index']);

Route::get('/', [GuestHouseController::class, 'index']);
Route::post('/logout', [UserController::class, 'logout']);
Route::get('/register', [UserController::class, 'create']);
Route::post('/register', [UserController::class, 'store']);
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
Route::get('/account', [UserController::class, 'show'])->middleware('auth');
Route::put('/account/update/name', [UserController::class, 'update_name']);
Route::put('/account/update/email', [UserController::class, 'update_email']);
Route::post('/account/add/phone', [UserController::class, 'add_phone']);
Route::put('/account/update/phone', [UserController::class, 'add_phone']);
Route::post('/account/add/address', [UserController::class, 'add_address']);
Route::put('/account/update/address', [UserController::class, 'add_address']);

Route::post('/payment/{guesthouse}', [GuestHouseController::class, 'payment'])->middleware('auth');
Route::delete('/rooms/{guesthouse}', [GuestHouseController::class, 'destroy']);
Route::get('/rooms/{id}', [GuestHouseController::class, 'show']);
Route::put('/rooms/{guesthouse}', [GuestHouseController::class, 'update'])->middleware('auth');
Route::get('rooms/{guesthouse}/edit', [GuestHouseController::class, 'edit'])->middleware('auth');
Route::get('rooms/{guesthouse}/delete', [GuestHouseController::class, 'delete']);
Route::get('/guesthouses/create', [GuestHouseController::class, 'create']);
Route::post('/guesthouses', [GuestHouseController::class, 'store']);

Route::get('/search', [SearchController::class, 'search']);


Route::get('/about', function() {
    return view('about');
});


Route::get('test', function() {
    return view('test');
});













// Route::get('/users', function(Request $request) {
//     dd($request);
//     return 'BOANGG';
// });

// Route::get('/update-user/{id}', function ($id) {
//     return response($id, 200);
// });

// Route::get('request-json', function () {
//     return response()->json(['name'=>'joren', 'nationality'=>'nigga']);
// });

// Route::get('download', function() {
//     $path = public_path().'\robots.txt';
//     $name = 'robots.txt';
//     return response()->download($path, $name);
// });

// Route::get('/create', function () {
//     return "BOANG";
// });

// Route::match(['post'], '/postget', function () {
//     return 'GET AND POST ALLOWED NIGGA';
// });
