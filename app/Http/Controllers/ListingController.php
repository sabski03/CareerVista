<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Cache\LuaScripts;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    //show all listings
    public function index(){
        return view('listings/index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(6),
        ]);
    }

    //show single listing
    public function show($id){
        $listing = Listing::find($id);

        if($listing){
            return view('listings/show', [
                'listing' => $listing,
            ]);
        }else{
            abort('404');
        }
    }

    //create form
    public function create(){
        return view('listings/create');
    }

    //store listing data
    public function store(){
        $formFields = request()->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required',
        ]);

        $logoPath = null;

        if (request()->hasFile('logo')) {
            $logoPath = request()->file('logo')->store('logos', 'public');
            if (!$logoPath) {
                return redirect()->route('create')->with('danger', 'Failed to store logo file');
            }
        }

        $formFields['logo'] = $logoPath;

        $formFields['user_id'] = auth()->id();


        $listing = Listing::create($formFields);


        if ($listing) {
            return redirect()->route('home')->with('success', 'Your Job Has Been Posted');
        } else {
            return redirect()->route('create')->with('danger', 'Something went wrong');
        }

    }

    //show edit form
    public function edit($id){
        $listing = Listing::find($id);

        return view('listings/edit', ['listing' => $listing]);
    }

    //update edit form
    public function update(Listing $listing){

        //test if logged in user is the owner
        if($listing->user_id != auth()->id()){
            abort(403, 'Unauthorized Action');
        }

        $formFields = request()->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required',
        ]);

        $logoPath = null;

        if (request()->hasFile('logo')) {
            $logoPath = request()->file('logo')->store('logos', 'public');
            if (!$logoPath) {
                return redirect()->route('create')->with('danger', 'Failed to store logo file');
            }
        }

        $formFields['logo'] = $logoPath;

        $testSuccess = $listing->update($formFields);

        if ($testSuccess) {
            $listing->touch();
            return back()->with('success', 'Listing Updated Successfully');
        } else {
            return redirect()->route('create')->with('danger', 'Something went wrong');
        }
    }

    //DELETE LISTING
    public function delete($listing){
        //test if logged in user is the owner
        if($listing->user_id != auth()->id()){
            abort(403, 'Unauthorized Action');
        }

        $deletedListing = Listing::find($listing);
        $deletedListing->delete();
        return redirect('/')->with('success', 'Listing Deleted Successfully');
    }

    //manage listings
    public function manage(){
        return view('listings/manage', ['listings' => auth()->user()->listings()->get()]);
    }


}
