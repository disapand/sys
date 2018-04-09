<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function index() {
        if (session() -> get('success')) {
            session() -> forget('success');
        }
        return view('welcome');
    }

    public function login(Request $request) {
        $credentials =  $this -> validate($request, [
            'Num' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            session() -> flash('success', '欢迎您'. Auth::user() -> name );
            return view('pages.index', compact(Auth::user()));
        }else {
            session() -> flash('danger', '工号和密码不匹配，请确认后重新登录');
            return redirect('/');
        }
    }
}
