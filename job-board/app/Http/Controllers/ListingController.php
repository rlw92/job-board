<?php

namespace App\Http\Controllers;

use App\Models\listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    //show all listings
    public function index(){

        //dd(request());

        return view('listings.index', [
            'heading' => 'Latest Listings',
            //'listings' => listing::latest()->filter(request(['tag', 'search']))->get()
            //code below is for pagination, above gives all items
            'listings' => listing::latest()->filter(request(['tag', 'search']))->paginate(4)
             //simple paginate just gives us next and previous buttons
           // 'listings' => listing::latest()->filter(request(['tag', 'search']))->simplePaginate(4)

        ]);

    }

    //show single listings
    public function show(listing $listing){
        return view('listings.show',[
            'listing' => $listing
        ]);

    }

    public function create(){
        return view("listings.create");
    }
//store data to database
    public function store(Request $request){

        //dd($request->file('logo')->store('logos', 'public'));
 $formFields = $request->validate([

    
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        Listing::create($formFields);
        return redirect('/')->with('message', 'Listing created successfully!');
        }

}
