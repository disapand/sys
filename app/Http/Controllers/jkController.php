<?php

namespace App\Http\Controllers;

use App\Models\fjxx;
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

        if (Auth::user() -> role == '营业员' || Auth::user() -> role == '财务') {
            $js = jk::paginate(9);
        } else {
            $js = jk::where('tjr', Auth::user() -> id) -> paginate(9);
        }

        return view('jk.list', compact('js'));
    }

    public function query($condition = '', $queryString = '') {
        $jks = [];
        if ( $queryString == '' ) {
            $jkxxs = jk::all();
        }else {
            if ($condition != '借款人姓名') {
                $jkxxs = jk::where( 'id', $queryString) -> get();
            } else {
                $user_name_to_id = jbxx::where('name', $queryString) -> get();
            }
        }

        if (isset($jkxxs)) {
            foreach ($jkxxs as $jkxx) {
                array_push($jks ,array_merge($jkxx->jbxx -> toArray() ,$jkxx -> toArray()));
            }
        }

        if (isset($user_name_to_id)) {
            foreach ($user_name_to_id as $id) {
                $t = jk::where('jbxx_id', $id -> id)->get();
                foreach ($t as $i) {
                    array_push($jks ,array_merge($id -> toArray(), $i -> toArray(),
                        ['dqsj' => Carbon::createFromFormat('Y-m-d', $i -> jksj) -> addMonths($i -> jkqx) -> toDateString() ]));
                }
            }
        }

        return response() -> json($jks);
    }

    public function show(jk $jk){
        return view('jk.show', compact('jk'));
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
