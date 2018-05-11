<?php

namespace App\Http\Controllers;

use App\Models\jbxx;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class indexController extends Controller
{
    public function dashboard() {

        $jbxxTodayAdd = '';
        $jbxxOneWeekAdd = '';
        $jbxxOneMonthAdd = '';
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
        } else {
            $jbxxTodayAdd = jbxx::where('created_at','>=', Carbon::today()->toDateTimeString())->count();
            $jbxxOneWeekAdd = jbxx::where('created_at','>=', Carbon::parse('1 week ago')->toDateTimeString())->count();
            $jbxxOneMonthAdd = jbxx::where('created_at','>=', Carbon::parse('1 month ago')->toDateTimeString())->count();
        }

        return view('dashboard', compact('jbxxTodayAdd', 'jbxxOneWeekAdd', 'jbxxOneMonthAdd'));
    }
}
