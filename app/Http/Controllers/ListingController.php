<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia(
            'Listing/Index',
            [
                'listings' => Listing::all()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Listing/Create'); //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // $listing = new Listing();//
        // $listing->beds = $request->beds;//it takes the value from the request and assigns it to the listing object
        // $listing->save();

        // we use the above method is used to store the single value in the database which is not recommended we instead use the below method to store the multiple values in the database at once it is called mass assignment we define the fillable property in theListing model to store the multiple values in the database at once

        //TODO: Validate/Sanitize/authenticate/CSRF Protect the request data before storing it in the database
        //TODO: Add a success message to the session use flash messages to display the message
        //TODO: Redirect the user to the index page
        //TODO: Use this validation  for portfolio project in the security section.


        Listing::create($request->all());

        return redirect()->route('listing.index')
            ->with('success', 'Listing created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Listing $listing)
    {
        return inertia(
            'Listing/Show',
            [
                'listing' => $listing
            ]
        );
    }

    // is the same as:

    // public function show(string $id)
    // {
    //     return inertia(
    //         'Listing/Show',
    //         [
    //             'listing' => Listing::find($id)
    //         ]
    //     );
    // }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
