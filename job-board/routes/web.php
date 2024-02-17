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

//single listing showing route model find showing 404
Route::get('/listing/{listing}', function(listing $listing){
    
        return view('singlelisting',[
       'listing' => $listing
   ]);
    
});



