<?php

namespace App\Http\Controllers;

use App\Models\fjxx;
use App\Models\hk;
use App\Models\jbxx;
use App\Models\jk;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class jkController extends Controller
{

    public function create() {
        $users = fjxx::where('fjxx_zt', '审核通过')->get();
        return view('jk.create', compact('users'));
    }

    public function store(Request $request) {

        jk::create([
            'jbxx_id' => $request -> jbxx_id,
            'jklx' => $request -> jklx,
            'hth' => $request -> hth,
            'jkqx' => $request -> jkqx,
            'jkje' => $request -> jkje,
            'll' => $request -> ll,
            'sxf' => $request -> sxf,
            'jksj' => $request -> jksj,
            'hkfs' => $request -> hkfs,
            'tjr' => Auth::user() -> id,
        ]);

        return response() -> json(['statue' => 'success', 'dd' => '信息添加成功']);
    }

    public function list() {

        if (Auth::user() -> role == '客服' || Auth::user() -> role == '财务' || Auth::user() -> role == '管理员') {
            $js = jk::paginate(9);
        } else {
            $js = jk::where('tjr', Auth::user() -> id) -> paginate(9);
        }

        return view('jk.list', compact('js'));
    }

    public function query($condition = '', $queryString = '') {
        $jks = [];
        if ( $queryString == '' ) {
            $jkxxs = jk::where('tjr', Auth::user() -> id) -> get();
        }else {
            if ($condition != '借款人姓名') {
                $jkxxs = jk::where( 'id', $queryString) -> where('tjr', Auth::user() -> id) -> get();
            } else {
                $user_name_to_id = jbxx::where('name', $queryString) -> get();
            }
        }

        if (isset($jkxxs)) {
            foreach ($jkxxs as $jkxx) {
                array_push($jks ,array_merge($jkxx->jbxx -> toArray() ,$jkxx -> toArray(),
                    ['dqsj' => Carbon::createFromFormat('Y-m-d', $jkxx -> jksj) -> addMonths($jkxx -> jkqx) -> toDateString()]));
            }
        }

        if (isset($user_name_to_id)) {
            foreach ($user_name_to_id as $id) {
                $t = jk::where('jbxx_id', $id -> id) -> where('tjr', Auth::user() -> id)->get();
                foreach ($t as $i) {
                    $sfyh = '否';
                    if (!$i -> hk -> isEmpty())
                        $sfyh = '是';
                    array_push($jks ,array_merge($id -> toArray(), $i -> toArray(),
                        ['dqsj' => Carbon::createFromFormat('Y-m-d', $i -> jksj) -> addMonths($i -> jkqx) -> toDateString(),
                            'zlx' => round($i -> jkje * $i -> ll /100, 2) . '元',
                            'sfyh' => $sfyh,
                            'yhlx' => $i -> hk -> sum('lx') . '元'
                        ]));
                }
            }
        }

        return response() -> json($jks);
    }

    public function show(jk $jk){

        $hk = hk::where('jkbh', $jk -> id) -> get();
        $yhje = $hk -> count();
        $hk_list = [];
        foreach ($hk as $t) {
            array_push($hk_list, array_merge($t -> toArray(), ['jkr' => $t -> jk -> jbxx -> name, ]));
        }

        return view('jk.show', compact('jk', 'hk_list'));
    }

    public function edit(jk $jk){
        return view('jk.edit', compact('jk'));
    }

    public function update(jk $jk, Request $request) {
        $jk -> jklx = $request -> jklx;
        $jk -> hth = $request -> hth;
        $jk -> jkqx = $request -> jkqx;
        $jk -> jkje = $request -> jkje;
        $jk -> ll = $request -> ll;
        $jk -> sxf = $request -> sxf;
        $jk -> jksj = $request -> jksj;
        $jk -> hkfs = $request -> hkfs;
        $jk -> save();
        return response() -> json(['statue' => 'success', 'dd' => '信息更新成功']);
    }

}
