<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class jkrController extends Controller
{

    public function create() {
        return view('jkr.create');
    }

    public function jbxxStore(Request $request) {

        if ($request->hasFile('fjxx')) {
            $file = $request->file('fjxx');
            $baseDir = 'uploads/img/' . Date('Y-m-d') . '/';
            $fileExt = $file -> getClientOriginalExtension();
            $newFileName = md5(time()) . random_int(5, 5) . '.' . $fileExt;
            $file -> move($baseDir, $newFileName);
            return response() -> json(['statue' => 'success', 'dd' => $baseDir . $newFileName ]);
        }

        if (isset($request->name) && isset($request->tel) && isset($request->IDCard) && isset($request->sex) && isset($request->jklb) && isset($request->addr) &&
            isset($request->rzsj) && isset($request->dwdz) && isset($request->dwdh) && isset($request->rzxs) &&isset($request->zsr)) {
            return response() -> json(['statue' => 'success', 'dd' => '添加信息成功']);
        }else {
            return response() -> json(['statue' => 'error', 'dd' => '请填写完整的信息']);
        }
    }
}
