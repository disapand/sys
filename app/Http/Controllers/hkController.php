<?php

namespace App\Http\Controllers;

use App\Models\hk;
use App\Models\jk;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class hkController extends Controller
{

    public function create(jk $jk ,Request $request){
        $jkbh = $jk -> id;

        //未还金额的设置
        $whje = round($jk -> jkje * ( 1 + $jk -> ll / 100), 2);
        $yhje = $jk -> yhje;
        $whje = $whje - $yhje - $request -> hkje;

        $jk -> yhje += $request -> hkje;
        $jk -> sfyh = '是';

        $hkje = $request -> hkje;
        $bj = $request -> bj;
        $lx = $request -> lx;
        $khjl = $request -> khjl;
        hk::create([
            'jkbh' => $jkbh,
            'hkje' => $hkje,
            'bj' => $bj,
            'lx' => $lx,
            'hksj' => Carbon::now() -> toDateString(),
            'khjl' => $khjl,
            'whje' => $whje,
        ]);
        return response() -> json(['statue' => 'success', 'dd' => '还款信息添加成功']);
    }

    public function show() {
        if (Auth::user() -> role == '客服' || Auth::user() -> role == '财务' || Auth::user() -> role == '管理员') {
            $hk = hk::paginate(9);
        }else{
            $hk = hk::whereHas('jk', function($q) {
                $q -> where('tjr', Auth::user() -> id);
            } ) -> paginate(9);
        }


        return view('hk.list', compact('hk'));
    }

    public function edit(hk $hk) {
        return view('hk.edit', compact('hk'));
    }

    public function update(hk $hk, Request $request) {
        $hk -> hkje = $request -> hkje;
        $hk -> bj = $request -> bj;
        $hk -> lx = $request -> lx;
        $hk -> hksj = $request -> hksj;
        $hk -> khjl = $request -> khjl;
        $hk -> whje = $request -> whje;
        $hk -> save();
        return response() -> json(['statue' => 'success', 'dd' => '还款信息更新成功']);
    }

    public function query($condition = '', $queryString = '') {
        if ($queryString == '') {
            return redirect()->route('hkShow');
        } else {
            if (Auth::user()->role != '业务员' ) {
                if ($condition == '借款人姓名') {
                    $hk = hk::whereHas('jk', function($q) use ($queryString) {
                        $q->whereHas('jbxx', function($query) use ($queryString){
                           $query->where('name', 'like',  '%' . $queryString . '%');
                        });
                    })->paginate(9);
                } else {
                    $hk = hk::whereHas('jk', function($q) use ($queryString){
                        $q->where('id', $queryString);
                    })->paginate(9);
                }
            } else {
                if ($condition == '借款人姓名') {
                    $hk = hk::whereHas('jk', function($q) use ($queryString) {
                        $q->whereHas('jbxx', function($query) use ($queryString){
                            $query->where('name', 'like',  '%' . $queryString . '%');
                        })->where('tjr', Auth::user()->id);
                    })->paginate(9);
                } else {
                    $hk = hk::whereHas('jk', function($q) use ($queryString){
                        $q->where('id', $queryString)->where('tjr', Auth::user()->id);
                    })->paginate(9);
                }
            }
        }

        return view('hk.list', compact('hk'));
    }

}
