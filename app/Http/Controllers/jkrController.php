<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class jkrController extends Controller
{
    public function create() {
        return view('jkr.create');
    }

    public function jbxxStore(Request $request) {
        return json_encode(['statue' => 'success', 'dd' => '返回成功']);
    }
}
