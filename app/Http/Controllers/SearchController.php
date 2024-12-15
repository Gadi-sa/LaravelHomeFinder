<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;

class SearchController extends Controller
{
    /**
     * Handle the search request and return search results.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Inertia\Response
     */
    public function index(Request $request)
    {
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

        return inertia(
            'Search/Index',
            [
                'listings' => $listings,
                'search' => $search,
            ]
        );
    }
}
