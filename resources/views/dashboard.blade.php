@extends('layouts._layouts')

@section('css')
    <style>
        .dashboard-num {
            display: block;
            font-size: 2em;
            font-weight: bold;
            margin-top: 10px;
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
    <el-card style="width: 480px;margin: 20px;">
        <h4 slot="header" style="color: #3a8ee6">
            新增客户数量
        </h4>
        <el-row>
            <el-col :span="8" style="text-align: center">
                今日新增
                <span class="dashboard-num">
                    <a href="">{{ $jbxxTodayAdd }}</a>
                </span>
            </el-col>
            <el-col :span="8" style="text-align: center">
                本周新增
                <span class="dashboard-num">
                    <a href="">{{ $jbxxOneWeekAdd }}</a>
                </span>
            </el-col>
            <el-col :span="8" style="text-align: center">
                本月新增
                <span class="dashboard-num">
                    <a href="">{{ $jbxxOneMonthAdd }}</a>
                </span>
            </el-col>
        </el-row>
    </el-card>

@stop

@section('script_vue')

    vm.activeIndex = '1'

@stop