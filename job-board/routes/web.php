<?php

use App\Models\listing;
use App\Models\JobListing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

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



//all listing
Route::get('/', [ListingController::class, 'index']);

/*single listing showing manual 404 code
Route::get('/listing/{id}', function($id){
    $listing  = listing::find($id);

    if($listing){
        return view('singlelisting',[
    'heading' => "the listing",
    'listing' => listing::find($id)
   ]);
    }
    else{
        abort('404');
    }
});
*/



//show create form
Route::get('/listing/create', [ListingController::class, 'create'])->middleware('auth');
//post details to database and show the listing 
Route::post('/listing', [ListingController::class, 'store']);

//manage listings
Route::get('/listing/manage', [ListingController::class, 'manage'])->middleware('auth');

//single listing showing route model find showing 404
Route::get('/listing/{listing}', [ListingController::class, 'show'] );

//edit submit
Route::put('/listing/{listing}', [ListingController::class, 'update'] )->middleware('auth');

//show edit form
Route::get('/listing/{listing}/edit', [ListingController::class, 'showedit'])->middleware('auth');

//Delete listing
Route::delete('/listing/{listing}', [ListingController::class, 'destroy'])->middleware('auth');


//Show register page
Route::get('/register', [UserController::class, 'create'])->middleware('guest');;
//create user
Route::post('/users', [UserController::class, 'store']);

//log user out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//show login form
Route::get('/login',[UserController::class, 'login'])->name('login')->middleware('guest');;

//login user    test@test.com test123
Route::post('/users/authenticate', [UserController::class, 'authenticate']);






