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
            'dqsj' => Carbon::createFromFormat('Y-m-d', $request -> jksj) -> addMonths($request -> jkqx) -> toDateString(),
            'zlx' => round(($request -> jkje * $request -> ll / 100),2),
            'yhlx' => '0',
            'sfyh' => '否',
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

        if ($queryString == '') {
            return redirect()->route('jkList');
        } else {
            if (Auth::user()->role != '业务员' ) {
                if ($condition == '借款人姓名') {
                    $js = jk::whereHas('jbxx', function($q) use ($queryString) {
                        $q->where('name', 'like',  '%' . $queryString . '%');
                    })->paginate(9);
                } else {
                    $js = jk::where('id', $queryString)->paginate(9);
                }
            } else {
                if ($condition == '借款人姓名') {
                    $js = jk::whereHas('jbxx', function($q) use ($queryString) {
                        $q->where('name', 'like',  '%' . $queryString . '%');
                    })->where('tjr', Auth::user()->id)->paginate(9);
                } else {
                    $js = jk::where('id', $queryString)->where('tjr', Auth::user()->id)->paginate(9);
                }
            }
        }

        return view('jk.list', compact('js'));
    }

    public function show(jk $jk){

        $hk = hk::where('jkbh', $jk -> id) -> get();
        $yhje = $hk -> count();
        $hk_list = [];
        foreach ($hk as $t) {
            array_push($hk_list, array_merge($t->toArray(), ['jkr' => $t -> jk -> jbxx -> name]));
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
