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
                'listings' => Listing::orderByDesc('created_at')
                    ->paginate(10)
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
        //TODO: Validate/Sanitize/authenticate/CSRF Protect the request data before storing it in the database
        //TODO: Add a success message to the session use flash messages to display the message
        //TODO: Use this validation  for portfolio project in the security section.

        /**
         * Create a new listing for the authenticated user.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        $request->user()->listings()->create(
            $request->validate([
                'beds' => ['required', 'integer', 'min:1', 'max:20'],
                'baths' => ['required', 'integer', 'min:1', 'max:20'],
                'area' => ['required', 'integer', 'min:20', 'max:2000'],
                'city' => ['required'],
                'code' => ['required'],
                'street' => ['required'],
                'street_nr' => ['required', 'min:1', 'max:255'],
                'price' => ['required', 'integer', 'min:10000', 'max:10000000'],
            ])
        );

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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Listing $listing)
    {
        return inertia(
            'Listing/Edit',
            [
                'listing' => $listing
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Listing $listing)
    {
        $listing->update(
            $request->validate([
                'beds' => ['required', 'integer', 'min:1', 'max:20'],
                'baths' => ['required', 'integer', 'min:1', 'max:20'],
                'area' => ['required', 'integer', 'min:20', 'max:2000'],
                'city' => ['required'],
                'code' => ['required'],
                'street' => ['required'],
                'street_nr' => ['required', 'min:1', 'max:255'],
                'price' => ['required', 'integer', 'min:10000', 'max:10000000'],
            ])
        );

        return redirect()->route('listing.index')
            ->with('success', 'Listing was changed!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listing $listing)
    {
        $listing->delete();

        return redirect()->back()
            ->with('success', 'Listing was deleted!');
    }
}
