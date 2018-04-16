<?php

namespace App\Http\Controllers;

use App\Models\jbxx;
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
            $fjxx_tostring = '';
            if (count($request -> fjxx) == 1) {
                $fjxx_tostring = $request -> fjxx[0];
            } else {
                $fjxx_tostring = implode(',', $request -> fjxx);
            }
            jbxx::with(['zyxx','lxrxx', 'qtxx', 'fjxx']) -> create([
                'name' => $request -> name,
                'tel' => $request -> tel,
                'IDCard' => $request -> IDCard,
                'sex' => $request -> sex,
                'jklb' => $request -> jklb,
                'hj' => $request -> hj,
                'addr' => $request -> addr,
                'xl' => $request -> xl,
                'gzdw' => $request -> gzdw,
                'dwxz' => $request -> dwdz,
                'sshy' => $request -> sshy,
                'rzbm' => $request -> rzbm,
                'zw' => $request -> zw,
                'rzsj' => $request -> rzsj,
                'dwdz' => $request -> dwdz,
                'dwdh' => $request -> dwdh,
                'rzxs' => $request -> rzxs,
                'zsr' => $request -> zsr,
                'lxr' => $request -> lxr,
                'gx' => $request -> gx,
                'lxdh' => $request -> lxdh,
                'sfzh' => $request -> sfzh,
                'dk' => $request -> dk,
                'fclb' => $request -> fclb,
                'gmsj' => $request -> gmsj,
                'gmjg' => $request -> gmjg,
                'gmfs' => $request -> gmfs,
                'gmdz' => $request -> gmdz,
                'fjxx' => $fjxx_tostring,
            ]);
            return response() -> json(['statue' => 'success', 'dd' => '添加信息成功']);
        }else {
            return response() -> json(['statue' => 'error', 'dd' => jbxx::all()]);
//            return response() -> json(['statue' => 'error', 'dd' => '请填写完整的信息']);
        }
    }
}
