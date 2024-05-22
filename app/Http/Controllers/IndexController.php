<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class IndexController extends Controller
{
    public function index()
    {
        // dd(Listing::all());
        // dd(Auth()->user());
        return inertia(
            'Index/Index',
            [
                'message' => 'Hello this is index message',
                ]
            );
    }


    public function show()
    {
        return inertia(
            'Index/Show',
            [
                'message' => 'Hello this is show message',
            ]
        );
    }
}
