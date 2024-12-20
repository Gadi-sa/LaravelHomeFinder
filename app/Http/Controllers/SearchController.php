<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        //TODO: add validation, error handling and update the search to be more specific
        // get the search term from the request

        $request->validate([
            'search' => 'required|string|max:255',
        ]);

        $search = $request->input('search');
        $listings = Listing::where('city', 'like', "%$search%")
            ->orWhere('code', 'like', "%$search%")
            ->orWhere('price', 'like', "%$search%")
            ->orWhere('street', 'like', "%$search%")
            ->orWhere('street_nr', 'like', "%$search%")

            ->get();

        return inertia('Search/Index', [
            'listings' => $listings,

            // pass the search term to the view
            'search' => $search,
        ]);
    }
}
