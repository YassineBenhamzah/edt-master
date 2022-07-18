<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function Search(Request $request){
        return view('search');
    }
}
