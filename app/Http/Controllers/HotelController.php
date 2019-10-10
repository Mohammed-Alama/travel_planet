<?php

namespace App\Http\Controllers;

use App\Models\Hotel;

class HotelController extends Controller
{
    public function index()
    {
        return view('hotels')->with('hotels', Hotel::all());
    }
}
