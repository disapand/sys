@extends('layouts._layouts')

@section('css')
    <style>
        .dashboard-num {
            display: block;
            font-size: 2em;
            font-weight: bold;
            margin-top: 10px;
            margin-bottom: 20px;
        }

        .dashboard-num a {
            color: #3a8ee6;
        }

        .dashboard-num a:hover, .dashboard-num a:visited {
            text-decoration: none;
            color: #3a8ee6;
        }
        
    </style>
@stop

@section('content')

    @include('shared._message_vue')

    {{--未审核客户数--}}
    @if( \Illuminate\Support\Facades\Auth::user()->role == '审核员')
        <el-card style="width: 15%;margin: 20px;display: inline-block;" shadow="hover">
            <h4 slot="header" style="color: #3a8ee6">
                待审核客户
            </h4>
            <el-row>
                <el-col :span="24" style="text-align: center">
                <span class="dashboard-num" style="font-size: 3em;">
                    <a href="{{ route('wsh') }}" style="color: #F56C6C; ">{{ $wsh }}</a>
                </span>
                </el-col>
            </el-row>
        </el-card>
    @endif

    {{--新增客户数统计面板--}}
    <el-card style="width: 30%;margin: 20px;display: inline-block;" shadow="hover">
        <h4 slot="header" style="color: #3a8ee6">
            新增客户数量
        </h4>
        <el-row>
            <el-col :span="8" style="text-align: center">
                今日新增
                <span class="dashboard-num">
                    <a href="{{ route('jkr_query', ['query' => \Carbon\Carbon::today()->toDateTimeString()]) }}">{{ $jbxxTodayAdd }}</a>
                </span>
            </el-col>
            <el-col :span="8" style="text-align: center">
                本周新增
                <span class="dashboard-num">
                    <a href="{{ route('jkr_query', ['query' => \Carbon\Carbon::parse('7 days ago')->toDateTimeString()]) }}">{{ $jbxxOneWeekAdd }}</a>
                </span>
            </el-col>
            <el-col :span="8" style="text-align: center">
                本月新增
                <span class="dashboard-num">
                    <a href="{{ route('jkr_query', ['query' => \Carbon\Carbon::parse('1 month ago')->toDateTimeString()]) }}">{{ $jbxxOneMonthAdd }}</a>
                </span>
            </el-col>
        </el-row>
    </el-card>

    {{--借款信息统计面板--}}
    @if(\Illuminate\Support\Facades\Auth::user()->role != '审核员')
        <el-card style="width: 64.5%;margin: 20px;display: inline-block;" shadow="hover">
            <h4 slot="header" style="color: #3a8ee6">
                新增借款数量
            </h4>
            <el-row>
                <el-col :span="8" style="text-align: center">
                    今日新增
                    <span class="dashboard-num">
                    <a href="{{ route('jk_query', ['query' => \Carbon\Carbon::today()->toDateTimeString()]) }}">{{ $jkTodayAdd }}</a>
                </span>
                    今日借款总额
                    <span class="dashboard-num" style="color: #F56C6C">
                    {{ number_format($jkTodayTotal, 2) }}元
                </span>
                </el-col>
                <el-col :span="8" style="text-align: center">
                    本周新增
                    <span class="dashboard-num">
                    <a href="{{ route('jk_query', ['query' => \Carbon\Carbon::parse('7 days ago')->toDateTimeString()]) }}">{{ $jkOneWeekAdd }}</a>
                </span>
                    本周借款总额
                    <span class="dashboard-num" style="color: #F56C6C">
                    {{ number_format($jkOneWeekTotal, 2) }}元
                </span>
                </el-col>
                <el-col :span="8" style="text-align: center">
                    本月新增
                    <span class="dashboard-num">
                    <a href="{{ route('jk_query', ['query' => \Carbon\Carbon::parse('1 month ago')->toDateTimeString()]) }}">{{ $jkOneMonthAdd }}</a>
                </span>
                    本月借款总额
                    <span class="dashboard-num" style="color: #F56C6C">
                    {{ number_format($jkOneMonthTotal, 2) }}元
                </span>
                </el-col>
            </el-row>
        </el-card>

    {{--还款信息统计面板--}}
    <el-card style="width: 97.5%;margin: 20px;display: inline-block;" shadow="hover">
        <h4 slot="header" style="color: #3a8ee6">
            还款信息
        </h4>
        <el-row>
            <el-col :span="8" style="text-align: center">
                已还总额
                <span class="dashboard-num" style="color: #F56C6C">
                    {{ number_format($yhje, 2) }}元
                </span>
                未还总额
                <span class="dashboard-num" style="color: #F56C6C">
                    {{ number_format($zje - $yhje, 2) }}元
                </span>
            </el-col>
            <el-col :span="8" style="text-align: center">
                已还本金
                <span class="dashboard-num" style="color: #F56C6C">
                    {{ number_format($yhbj, 2) }}元
                </span>
                未还本金
                <span class="dashboard-num" style="color: #F56C6C">
                    {{ number_format($zbj - $yhbj, 2) }}元
                </span>
            </el-col>
            <el-col :span="8" style="text-align: center">
                已还利息
                <span class="dashboard-num" style="color: #F56C6C">
                    {{ number_format($yhlx, 2) }}元
                </span>
                未还利息
                <span class="dashboard-num" style="color: #F56C6C">
                    {{ number_format($zlx - $yhlx, 2) }}元
                </span>
            </el-col>
            <el-col :span="8" style="text-align: center">
                逾期数量
                <span class="dashboard-num">
                    <a href="{{ route('yqcx') }}">{{ $yqsl }}</a>
                </span>
            </el-col>
        </el-row>
    </el-card>
    @endif

@stop

@section('script_vue')

    vm.activeIndex = '1'

@stop