<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class hkController extends Controller
{

    public function create(Request $request){
        return response() -> json($request -> all());
    }
}