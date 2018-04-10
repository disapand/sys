<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function edit() {
        return view('users.edit');
    }

    public function update(User $user,  Request $request) {

        $credentials =  $this -> validate($request, [
            'password' => 'required',
            'password_new' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $user -> update([
                'password' => bcrypt($request -> password_new)
            ]);
            session() -> flash('success','密码修改成功');
        } else {
            session() -> flash('error','密码错误');
        }

        return redirect() -> route('editUser');
    }

    public function logout(){
        Auth::logout();
        session() -> flash('success', '您已退出登录!');
        return redirect('/');
    }

    public function list() {
        $users = User::all();

        return view('users.list', compact('users'));
    }

}
