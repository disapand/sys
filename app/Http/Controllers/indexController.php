<?php

namespace App\Http\Controllers;

use App\Models\hk;
use App\Models\jbxx;
use App\Models\jk;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class indexController extends Controller
{
    public function dashboard() {

        $jk = jk::all();
        $jk_user = jk::where('tjr', Auth::user()->id);

        if (Auth::user()->role == '业务员') {
            $jbxxTodayAdd = jbxx::whereHas('fjxx', function ($q){
                $q->where('tjr', Auth::user()->id);
            })->where('created_at','>=', Carbon::today()->toDateTimeString())->count();
            $jbxxOneWeekAdd = jbxx::whereHas('fjxx', function ($q){
                $q->where('tjr', Auth::user()->id);
            })->where('created_at','>=', Carbon::parse('1 week ago')->toDateTimeString())->count();
            $jbxxOneMonthAdd = jbxx::whereHas('fjxx', function ($q){
                $q->where('tjr', Auth::user()->id);
            })->where('created_at','>=', Carbon::parse('1 month ago')->toDateTimeString())->count();
            $jkToday = jk::where('tjr', Auth::user()->id)->where('created_at', '>=', Carbon::today()->toDateTimeString());
            $jkOneWeek = jk::where('tjr', Auth::user()->id)->where('created_at', '>=', Carbon::parse('1 week ago')->toDateTimeString());
            $jkOneMonth = jk::where('tjr', Auth::user()->id)->where('created_at', '>=', Carbon::parse('1 month ago')->toDateTimeString());
            $zlx =  $jk_user->sum('zlx');
            $yhlx =  $jk_user->sum('yhlx');
            $zbj = $jk_user->sum('jkje');
            $yhbj = hk::whereHas('jk', function ($q){
                $q->where('tjr', Auth::user()->id);
            })->sum('bj');
            $yhje = $jk_user->sum('yhje');
            $zje = $zbj + $zlx;
            $yqsl = jk::where('tjr', Auth::user()->id)->where('dqsj', '<', Carbon::now()->toDateString())->where('sfyh','否')->count();
            $wsh = jbxx::whereHas('fjxx', function ($q){
                $q->where('jbxx_zt', '待审核')->orWhere('zyxx_zt', '待审核')->orWhere('lxrxx_zt', '待审核')->orWhere('qtxx_zt', '待审核')->where('tjr', Auth::user()->id);
            })->count();
        } else {
            $jbxxTodayAdd = jbxx::where('created_at','>=', Carbon::today()->toDateTimeString())->count();
            $jbxxOneWeekAdd = jbxx::where('created_at','>=', Carbon::parse('1 week ago')->toDateTimeString())->count();
            $jbxxOneMonthAdd = jbxx::where('created_at','>=', Carbon::parse('1 month ago')->toDateTimeString())->count();
            $jkToday = jk::where('created_at', '>=', Carbon::today()->toDateTimeString());
            $jkOneWeek = jk::where('created_at', '>=', Carbon::parse('1 week ago')->toDateTimeString());
            $jkOneMonth = jk::where('created_at', '>=', Carbon::parse('1 month ago')->toDateTimeString());
            $zlx =  $jk->sum('zlx');
            $yhlx =  $jk->sum('yhlx');
            $zbj = $jk->sum('jkje');
            $yhbj = hk::all()->sum('bj');
            $yhje = $jk->sum('yhje');
            $zje = $zbj + $zlx;
            $yqsl = jk::where('dqsj', '<', Carbon::now()->toDateString())->where('sfyh','否')->count();
            $wsh = jbxx::whereHas('fjxx', function ($q){
                $q->where('jbxx_zt', '待审核')->orWhere('zyxx_zt', '待审核')->orWhere('lxrxx_zt', '待审核')->orWhere('qtxx_zt', '待审核');
            })->count();
        }

        $jkTodayAdd = $jkToday->count();
        $jkOneWeekAdd = $jkOneWeek->count();
        $jkOneMonthAdd = $jkOneMonth->count();
        $jkTodayTotal = $jkToday->sum('jkje');
        $jkOneWeekTotal = $jkOneWeek->sum('jkje');
        $jkOneMonthTotal = $jkOneMonth->sum('jkje');

        return view('dashboard', compact('jbxxTodayAdd', 'jbxxOneWeekAdd',
            'jbxxOneMonthAdd', 'jkTodayAdd', 'jkOneWeekAdd', 'jkOneMonthAdd', 'jkTodayTotal', 'jkOneWeekTotal', 'jkOneMonthTotal',
            'yhlx', 'zlx', 'yhbj', 'zbj', 'yhje', 'zje', 'yqsl', 'wsh'));
    }

    public function jkr($query = '') {
        if (Auth::user()->role == '业务员') {
            $jkrs = jbxx::whereHas('fjxx', function ($q) {
                $q->where('tjr', Auth::user()->id);
            })->where('created_at', '>=', $query)->paginate(9);
        } else {
            $jkrs = jbxx::where('created_at', '>=', $query)->paginate(9);
        }

        return view('jkr.list', compact('jkrs'));
    }

    public function jk($query = '') {
        if (Auth::user()->role == '业务员') {
            $js = jk::where('tjr', Auth::user()->id)->where('created_at', '>=', $query)->paginate(9);
        } elseif (Auth::user()->role == '审核员'){
            session() -> flash('error','您没有该权限');
            return redirect()->back();
        }else {
            $js = jk::where('created_at', '>=', $query)->paginate(9);
        }

        return view('jk.list', compact('js'));
    }

    public function yqcx() {
        if (Auth::user()->role == '业务员') {
            $js = jk::where('tjr', Auth::user()->id)->where('dqsj', '<', Carbon::now()->toDateString())->where('sfyh','否')->paginate(9);
        } elseif (Auth::user()->role == '审核员') {
            session() -> flash('error','您没有该权限');
            return redirect()->back();
        } else {
            $js = jk::where('tjr', Auth::user()->id)->where('dqsj', '<', Carbon::now()->toDateString())->where('sfyh','否')->paginate(9);
        }

        return view('jk.list', compact('js'));
    }

    public function wsh() {
        $jkrs = jbxx::whereHas('fjxx', function ($q){
            $q->where('jbxx_zt', '待审核')->orWhere('zyxx_zt', '待审核')->orWhere('lxrxx_zt', '待审核')->orWhere('qtxx_zt', '待审核');
        })->paginate(9);
        return view('jkr.list', compact('jkrs'));
    }

}
