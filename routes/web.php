<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use App\Models\Listing;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

// Common Resource Routes:
// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Store new listing
// edit - Show form to edit listing
// update - Update listing
// destroy - Delete listing
//--------------------------------

//---LaraGigs Route--

//middleware  auth route group

Route::middleware(['auth'])->group(function () {
//show Create Form
    Route::get('/create',
        [ListingController::class,'create'])
        ->name('post.create');
//store post
    Route::post('/listings',
        [ListingController::class,'store'])
        ->name('post.store');
//show Edit form
    Route::get('/listing/{listing}/edit',
        [ListingController::class,'edit'])
        ->name('post.edit');

//show Update
    Route::put('/listings/{listing}',
        [ListingController::class,'update'])
        ->name('post.update');

//show delete
    Route::delete('/listings/{listing}',
        [ListingController::class,'delete'])
        ->name('post.delete');
//login in User
    Route::get('/manage',
        [ListingController::class,'manage'])
        ->name('manage');
// Log User Out
    Route::post('/logout',
        [UserController::class,'logout'])
        ->name('user.logout');
});
//----------------------------------------------

//middleware guest route group

Route::middleware(['guest'])->group(function (){
//show Register/Create Form
    Route::get('/register',
        [UserController::class,'create'])
        ->name('user.create');
//show login/Create Form
    Route::get('/login',
        [UserController::class,'login'])
        ->name('login');
});
//----------------------------------------

//All Listings
Route::get('/',
    [ListingController::class,'index']);

//Single Listing
Route::get('/listings/{listing}',
    [ListingController::class,'show']);
//Create new User
Route::post('/users',
    [UserController::class,'store'])
    ->name('user.store');
//login in User
Route::post('/users/authenticate',
    [UserController::class,'authenticate'])
    ->name('user.authenticate');

//----------------------------------------









////All Listings
//Route::get('/',
//    [ListingController::class,'index']);
//
////Single Listing
//Route::get('/listings/{listing}',
//     [ListingController::class,'show']);

////show Create Form
//Route::get('/create',
//    [ListingController::class,'create'])
//    ->name('post.create')
//    ->middleware('auth');

////store post
//Route::post('/listings',
//    [ListingController::class,'store'])
//    ->name('post.store')
//    ->middleware('auth');

////show Edit form
//Route::get('/listing/{listing}/edit',
//    [ListingController::class,'edit'])
//    ->name('post.edit')
//    ->middleware('auth');
//
////show Update
//Route::put('/listings/{listing}',
//    [ListingController::class,'update'])
//    ->name('post.update')
//    ->middleware('auth');
//
////show delete
//Route::delete('/listings/{listing}',
//    [ListingController::class,'delete'])
//    ->name('post.delete')
//    ->middleware('auth');

////show Register/Create Form
//Route::get('/register',
//    [UserController::class,'create'])
//    ->name('user.create')
//    ->middleware('guest');

////Create new User
//Route::post('/users',
//    [UserController::class,'store'])
//    ->name('user.store');

//// Log User Out
//Route::post('/logout',
//    [UserController::class,'logout'])
//    ->name('user.logout')
//    ->middleware('auth');

////show login/Create Form
//Route::get('/login',
//    [UserController::class,'login'])
//    ->name('login')
//    ->middleware('guest');

////login in User
//Route::post('/users/authenticate',
//    [UserController::class,'authenticate'])
//    ->name('user.authenticate');

////login in User
//Route::get('/manage',
//    [ListingController::class,'manage'])
//    ->name('manage')
//    ->middleware('auth');
