<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function edit() {
        return view('users.edit');
    }

    public function update(Request $request) {

        $credentials =  $this -> validate($request, [
            'password' => 'required',
            'password_new' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            dd(Auth::user() -> Num);
        } else {
            session() -> flash('error','密码错误');
            return redirect() -> route('editUser');
        }
    }

    public function logout(){
        Auth::logout();
        session() -> flash('success', '您已退出登录!');
        return redirect('/');
    }
}
