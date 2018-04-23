<?php

namespace App\Http\Controllers;

use App\Models\fjxx;
use App\Models\jbxx;
use App\Models\lxrxx;
use App\Models\qtxx;
use App\Models\zyxx;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class jkrController extends Controller
{

    public function create() {
        return view('jkr.create');
    }

    public function jbxxStore( Request $request) {

        if ($request->hasFile('fjxx')) {
            $file = $request->file('fjxx');
            $baseDir = 'uploads/img/' . Date('Y-m-d') . '/';
            $fileExt = $file -> getClientOriginalExtension();
            $newFileName = md5(time()) . random_int(5, 5) . '.' . $fileExt;
            $file -> move($baseDir, $newFileName);
            return response() -> json(['statue' => 'success', 'dd' =>'/' .  $baseDir . $newFileName ]);
        }

        if (isset($request->name) && isset($request->tel) && isset($request->IDCard) && isset($request->sex) && isset($request->jklb) && isset($request->addr)
//            && isset($request->rzsj) && isset($request->dwdz) && isset($request->dwdh) && isset($request->rzxs) &&isset($request->zsr)
        ) {
            $fjxx_tostring = '';
            if (count($request -> fjxx) == 1) {
                $fjxx_tostring = $request -> fjxx[0];
            } else if (isset($request -> fjxx)){
                $fjxx_tostring = implode(',', $request -> fjxx);
            }

            $tmp = jbxx::create([
                'name' => $request -> name,
                'tel' => $request -> tel,
                'IDCard' => $request -> IDCard,
                'sex' => $request -> sex,
                'jklb' => $request -> jklb,
                'hj' => $request -> hj,
                'addr' => $request -> addr,
                'xl' => $request -> xl,
                ]);
            zyxx::create([
                'jbxx_id' => $tmp -> id,
                'gzdw' => $request -> gzdw,
                'dwxz' => $request -> dwxz,
                'sshy' => $request -> sshy,
                'rzbm' => $request -> rzbm,
                'zw' => $request -> zw,
                'rzsj' => $request -> rzsj,
                'dwdz' => $request -> dwdz,
                'dwdh' => $request -> dwdh,
                'rzxs' => $request -> rzxs,
                'zsr' => $request -> zsr,
            ]);
            lxrxx::create([
                'jbxx_id' => $tmp -> id,
                'lxr' => $request -> lxr,
                'gx' => $request -> gx,
                'lxdh' => $request -> lxdh,
                'sfzh' => $request -> sfzh,
                'dk' => $request -> dk,
            ]);
            qtxx::create([
                'jbxx_id' => $tmp -> id,
                'fclb' => $request -> fclb,
                'gmsj' => $request -> gmsj,
                'gmjg' => $request -> gmjg,
                'gmfs' => $request -> gmfs,
                'gmdz' => $request -> gmdz,
            ]);
            fjxx::create([
                'jbxx_id' => $tmp -> id,
                'tjr' => Auth::user() -> id,
                'fjxx' => $fjxx_tostring,
            ]);
            return response() -> json(['statue' => 'success', 'dd' => '信息添加成功，请前往借款人列表查看']);
        }else {
//            return response() -> json(['statue' => 'error', 'dd' => jbxx::all()]);
            return response() -> json(['statue' => 'error', 'dd' => '请填写完整的信息']);
        }
    }

    public function list() {
        $jkrs = jbxx::all();

        return view('jkr.list', compact('jkrs'));
    }

    public function show(jbxx $jbxx) {

        $img_lists = $jbxx -> fjxx -> fjxx;
        $img_lists = explode(',', $img_lists);

        return view('jkr.show', compact('jbxx', 'img_lists'));
//        return response() -> json($img_list);
    }

    public function update(jbxx $jbxx, Request $request){

        $fjxx_tostring = '';
        if (count($request -> fjxx) == 1) {
            $fjxx_tostring = $request -> fjxx[0];
        } else if (isset($request -> fjxx)) {
            $fjxx_tostring = implode(',', $request -> fjxx);
        }

        $jbxx -> name = $request -> name;
        $jbxx -> IDCard = $request -> IDCard;
        $jbxx -> tel = $request -> tel;
        $jbxx -> sex = $request -> sex;
        $jbxx -> jklb = $request -> jklb;
        $jbxx -> xl = $request -> xl;
        $jbxx -> hj = $request -> hj;
        $jbxx -> addr = $request -> addr;

        $zyxx = zyxx::where('jbxx_id', $jbxx -> id) -> first();
        $zyxx -> gzdw = $request -> gzdw;
        $zyxx -> dwxz = $request -> dwxz;
        $zyxx -> sshy = $request -> sshy;
        $zyxx -> rzbm = $request -> rzbm;
        $zyxx -> zw = $request -> zw;
        $zyxx -> rzsj = $request -> rzsj;
        $zyxx -> dwdz = $request -> dwdz;
        $zyxx -> dwdh = $request -> dwdh;
        $zyxx -> rzxs = $request -> rzxs;
        $zyxx -> zsr = $request -> zsr;

        $lxrxx = lxrxx::where('jbxx_id', $jbxx -> id) -> first();
        $lxrxx -> lxr = $request -> lxr;
        $lxrxx -> gx = $request -> gx;
        $lxrxx -> lxdh = $request -> lxdh;
        $lxrxx -> sfzh = $request -> sfzh;
        $lxrxx -> dk = $request -> dk;

        $qtxx = qtxx::where('jbxx_id', $jbxx -> id) -> first();
        $qtxx -> fclb = $request -> fclb;
        $qtxx -> gmsj = $request -> gmsj;
        $qtxx -> gmjg = $request -> gmjg;
        $qtxx -> gmfs = $request -> gmfs;
        $qtxx -> gmdz = $request -> gmdz;

        $fjxx = fjxx::where('jbxx_id', $jbxx -> id) -> first();
        $fjxx -> fjxx = $fjxx_tostring;

        $jbxx -> save();
        $zyxx -> save();
        $lxrxx -> save();
        $qtxx -> save();
        $fjxx -> save();
        return response() -> json(['statue' => 'success', 'dd' => '信息更新成功，请刷新页面查看' ]);
    }

    public function query($condition = '', $queryString = '') {

        $jkrs = [];
        if ( $queryString == '' ) {
            $jbxxs = jbxx::all();
        }else {
            if ($condition != '借款人姓名') {
                $jbxxs = jbxx::where( 'id', $queryString) -> get();
            } else {
                $jbxxs = jbxx::where('name' , 'like' ,'%'.$queryString.'%') -> get();
            }
        }

        foreach ($jbxxs as $jbxx) {
            array_push($jkrs ,array_merge($jbxx -> toArray(), $jbxx->fjxx -> toArray(),$jbxx->zyxx -> toArray(),$jbxx->lxrxx -> toArray(),$jbxx->qtxx -> toArray()));
        }

        return response() -> json($jkrs);
    }

    public function sh($shyj = '', $sort, $zt = '审核不通过') {

    }

}
