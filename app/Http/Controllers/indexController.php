<?php

namespace App\Http\Controllers;

use App\Models\jbxx;
use App\Models\jk;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class indexController extends Controller
{
    public function dashboard() {

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
        } else {
            $jbxxTodayAdd = jbxx::where('created_at','>=', Carbon::today()->toDateTimeString())->count();
            $jbxxOneWeekAdd = jbxx::where('created_at','>=', Carbon::parse('1 week ago')->toDateTimeString())->count();
            $jbxxOneMonthAdd = jbxx::where('created_at','>=', Carbon::parse('1 month ago')->toDateTimeString())->count();
            $jkToday = jk::where('created_at', '>=', Carbon::today()->toDateTimeString());
            $jkOneWeek = jk::where('created_at', '>=', Carbon::parse('1 week ago')->toDateTimeString());
            $jkOneMonth = jk::where('created_at', '>=', Carbon::parse('1 month ago')->toDateTimeString());
        }

        $jkTodayAdd = $jkToday->count();
        $jkOneWeekAdd = $jkOneWeek->count();
        $jkOneMonthAdd = $jkOneMonth->count();
        $jkTodayTotal = $jkToday->sum('jkje');
        $jkOneWeekTotal = $jkOneWeek->sum('jkje');
        $jkOneMonthTotal = $jkOneMonth->sum('jkje');

        return view('dashboard', compact('jbxxTodayAdd', 'jbxxOneWeekAdd',
            'jbxxOneMonthAdd', 'jkTodayAdd', 'jkOneWeekAdd', 'jkOneMonthAdd', 'jkTodayTotal', 'jkOneWeekTotal', 'jkOneMonthTotal'));
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
        } else {
            $js = jk::where('created_at', '>=', $query)->paginate(9);
        }

        return view('jk.list', compact('js'));
    }
}
