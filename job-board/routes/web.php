<?php

use App\Models\listing;
use App\Models\JobListing;
use Illuminate\Http\Request;
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



//all listing
Route::get('/', function () {
    return view('listingswithblade', [
        'heading' => 'Latest Listings',
        'listings' => listing::all()
    ]);
});

//single listing

Route::get('/listing/{id}', function($id){
   return view('singlelisting',[
    'heading' => "the listing",
    'listing' => listing::find($id)
   ]);
});



