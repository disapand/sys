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

    public function add() {
        return view('users.add');
    }

    public function store(Request $request) {

        if (!$request->Num) {
            return response() -> json(['statue' => 'error', 'dd' => '工号不能为空']);
        }
        elseif ( User::where('Num', $request -> Num) -> count() != 0 ){
            return json_encode(['statue' => 'error', 'dd' => '工号重复']);
        }
        elseif (!$request->name) {
            return json_encode(['statue' => 'error', 'dd' => '姓名不能为空']);
        }
        elseif (!$request->password) {
            return json_encode(['statue' => 'error', 'dd' => '密码不能为空']);
        }
        elseif (!$request->role) {
            return json_encode(['statue' => 'error', 'dd' => '请选择账号类型']);
        } else{
            User::create([
                'name' => $request -> name,
                'Num' => $request -> Num,
                'password' => bcrypt($request->password),
                'role' => $request->role,
            ]);

            return response() -> json(['statue' => 'success', 'dd' => '添加成功']);
        }
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

    public function destroy(User $user) {
        $user -> delete();
        return response() -> json(['statue' => 'success', 'dd' => '账号删除成功']);
    }

}
