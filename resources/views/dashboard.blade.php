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

    {{--新增客户数统计面板--}}
    <el-card style="width: 480px;margin: 20px;display: inline-block;" shadow="hover">
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

    <el-card style="width: 880px;margin: 20px;display: inline-block;" shadow="hover">
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
                    {{ number_format($jkTodayTotal, 1) }}元
                </span>
            </el-col>
            <el-col :span="8" style="text-align: center">
                本周新增
                <span class="dashboard-num">
                    <a href="{{ route('jk_query', ['query' => \Carbon\Carbon::parse('7 days ago')->toDateTimeString()]) }}">{{ $jkOneWeekAdd }}</a>
                </span>
                本周借款总额
                <span class="dashboard-num" style="color: #F56C6C">
                    {{ number_format($jkOneWeekTotal, 1) }}元
                </span>
            </el-col>
            <el-col :span="8" style="text-align: center">
                本月新增
                <span class="dashboard-num">
                    <a href="{{ route('jk_query', ['query' => \Carbon\Carbon::parse('1 month ago')->toDateTimeString()]) }}">{{ $jkOneMonthAdd }}</a>
                </span>
                本月借款总额
                <span class="dashboard-num" style="color: #F56C6C">
                    {{ number_format($jkOneMonthTotal, 1) }}元
                </span>
            </el-col>
        </el-row>
    </el-card>

@stop

@section('script_vue')

    vm.activeIndex = '1'

@stop