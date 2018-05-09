<?php

namespace App\Http\Controllers;

use App\Models\fjxx;
use App\Models\jbxx;
use App\Models\lxrxx;
use App\Models\qtxx;
use App\Models\zyxx;
use Carbon\Carbon;
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
            && isset($request->zsr) && isset($request->khjl)
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
                'lxr2' => $request -> lxr2,
                'gx2' => $request -> gx2,
                'lxdh2' => $request -> lxdh2,
                'sfzh2' => $request -> sfzh2,
                'dk2' => $request -> dk2,
                'lxr3' => $request -> lxr3,
                'gx3' => $request -> gx3,
                'lxdh3' => $request -> lxdh3,
                'sfzh3' => $request -> sfzh3,
                'dk3' => $request -> dk3,
                'lxr4' => $request -> lxr4,
                'gx4' => $request -> gx4,
                'lxdh4' => $request -> lxdh4,
                'sfzh4' => $request -> sfzh4,
                'dk4' => $request -> dk4,
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
                'khjl' => $request -> khjl,
            ]);
            return response() -> json(['statue' => 'success', 'dd' => '信息添加成功，请前往借款人列表查看']);
        }else {
//            return response() -> json(['statue' => 'error', 'dd' => jbxx::all()]);
            return response() -> json(['statue' => 'error', 'dd' => '请填写完整的信息']);
        }
    }

    public function list() {
        if (Auth::user() -> role != '业务员') {
            $jkrs = jbxx::paginate(9);
        } else {
            $jkrs = jbxx::whereHas('fjxx', function ($query) {
                $query -> where('tjr', Auth::user() -> id);
            }) -> paginate(9);
        }
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
        $lxrxx -> lxr2 = $request -> lxr2;
        $lxrxx -> gx2 = $request -> gx2;
        $lxrxx -> lxdh2 = $request -> lxdh2;
        $lxrxx -> sfzh2 = $request -> sfzh2;
        $lxrxx -> dk2 = $request -> dk2;
        $lxrxx -> lxr3 = $request -> lxr3;
        $lxrxx -> gx3 = $request -> gx3;
        $lxrxx -> lxdh3 = $request -> lxdh3;
        $lxrxx -> sfzh3 = $request -> sfzh3;
        $lxrxx -> dk3 = $request -> dk3;
        $lxrxx -> lxr4 = $request -> lxr4;
        $lxrxx -> gx4 = $request -> gx4;
        $lxrxx -> lxdh4 = $request -> lxdh4;
        $lxrxx -> sfzh4 = $request -> sfzh4;
        $lxrxx -> dk4 = $request -> dk4;

        $qtxx = qtxx::where('jbxx_id', $jbxx -> id) -> first();
        $qtxx -> fclb = $request -> fclb;
        $qtxx -> gmsj = $request -> gmsj;
        $qtxx -> gmjg = $request -> gmjg;
        $qtxx -> gmfs = $request -> gmfs;
        $qtxx -> gmdz = $request -> gmdz;

        $fjxx = fjxx::where('jbxx_id', $jbxx -> id) -> first();
        $fjxx -> fjxx = $fjxx_tostring;
        $fjxx -> khjl = $request -> khjl;

        $jbxx -> save();
        $zyxx -> save();
        $lxrxx -> save();
        $qtxx -> save();
        $fjxx -> save();
        return response() -> json(['statue' => 'success', 'dd' => '信息更新成功，请刷新页面查看' ]);
    }

    public function query($condition = '', $queryString = '') {
        /*$jkrs = [];
        if ( $queryString == '' ) {
            $jbxxs = jbxx::whereHas('fjxx', function($q) {
                $q -> where('tjr', Auth::user() -> id);
            }) -> get();
        }else {
            if ($condition != '借款人姓名') {
                $jbxxs = jbxx::whereHas('fjxx', function($q){
                    $q -> where('tjr', Auth::user() -> id);
                }) -> where( 'id', $queryString) -> get();
            } else {
                $jbxxs = jbxx::whereHas('fjxx', function($q){
                    $q -> where('tjr', Auth::user() -> id);
                }) -> where('name' , 'like' ,'%'.$queryString.'%') -> get();
            }
        }

        foreach ($jbxxs as $jbxx) {
            array_push($jkrs ,array_merge($jbxx -> toArray(), $jbxx->fjxx -> toArray(),$jbxx->zyxx -> toArray(),$jbxx->lxrxx -> toArray(),$jbxx->qtxx -> toArray()));
        }

        return response() -> json($jkrs);*/

        if (Auth::user() -> role == '业务员') {
            if ($queryString == '') {
                return redirect() -> route('jkrList');
            } else {
                if ($condition != '借款人姓名') {
                    $jkrs = jbxx::whereHas('fjxx', function ($q) {
                        $q -> where('tjr', Auth::user() -> id);
                    }) -> where('id', $queryString) -> paginate(9);
                } else {
                    $jkrs = jbxx::whereHas('fjxx', function ($q) {
                        $q -> where('tjr', Auth::user() -> id);
                    }) -> where('name','like', '%' . $queryString. '%') -> paginate(9);
                }
            }
        } else {
            if ($queryString == '') {
                return redirect() -> route('jkrList');
            } else {
                if ($condition != '借款人姓名') {
                    $jkrs = jbxx::where('id', $queryString) -> paginate(9);
                } else {
                    $jkrs = jbxx::where('name', 'like', '%' . $queryString . '%') -> paginate(9);
                }
            }
        }

        return view('jkr.list', compact('jkrs'));

    }

    public function sh($shyj = '', jbxx $jbxx,  $sort, $zt = '审核不通过', Request $request) {

        $fjxx = fjxx::where('jbxx_id', $jbxx -> id) -> first();

        if ($shyj == '') {
            return response() -> json(['statue' => 'error', 'dd' => '请输入审核意见']);
        }else {
            switch ($sort) {
                case 'jbxx':
                    $fjxx -> jbxx_yj = $shyj;
                    $fjxx -> jbxx_zt = $zt;
                    $fjxx -> jbxxshr = Auth::user() -> id;
                    $fjxx -> jbxxshsj = Carbon::now();
                    break;
                case 'lxrxx':
                    $fjxx -> lxrxx_yj = $shyj;
                    $fjxx -> lxrxx_zt = $zt;
                    $fjxx -> lxrxxshr = Auth::user() -> id;
                    $fjxx -> lxrxxshsj = Carbon::now();
                    break;
                case 'zyxx':
                    $fjxx -> zyxx_yj = $shyj;
                    $fjxx -> zyxx_zt = $zt;
                    $fjxx -> zyxxshr = Auth::user() -> id;
                    $fjxx -> zyxxshsj = Carbon::now();
                    break;
                case 'qtxx':
                    $fjxx -> qtxx_yj = $shyj;
                    $fjxx -> qtxx_zt = $zt;
                    $fjxx -> qtxxshr = Auth::user() -> id;
                    $fjxx -> qtxxshsj = Carbon::now();
                    break;
                case 'fjxx':
                    $fjxx -> fjxx_yj = $shyj;
                    $fjxx -> fjxx_zt = $zt;
                    $fjxx -> fjxxshr = Auth::user() -> id;
                    $fjxx -> fjxxshsj = Carbon::now();
                    break;
                default: break;
            }
            $fjxx -> save();
//            return response() -> json(['statue' => 'success', 'dd' => $shyj . '--' . $sort . '--' . $zt]);
            return response() -> json(['statue' => 'success', 'dd' => '审核信息添加成功']);

        }
    }

}
