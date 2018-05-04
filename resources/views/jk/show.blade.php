@extends('layouts._layouts')

@section('content')
    @include('shared._errors_vue')

    <el-row :gutter="20">
        <el-col :span="20" :offset="2">

            <el-card>
                <div slot="header" class="clearfix">
                    <span>借款信息</span>
                    <el-button style="float:right" type="primary" @click="tzlj('{{ route('jkEdit', [$jk -> id]) }}')">编辑</el-button>
                </div>
                <el-row style="padding: 20px;background-color: rgba(200,200,200,.6); border-radius: 5px;">
                    <el-col :span="6">借款编号</el-col>
                    <el-col :span="6" style="font-weight: bold">{{ $jk -> id }}</el-col>
                    <el-col :span="6">借款人</el-col>
                    <el-col :span="6" style="font-weight: bold">{{ $jk -> jbxx -> name }}</el-col>
                </el-row>
                <el-row style="margin: 20px;">
                    <el-col :span="6">借款类型</el-col>
                    <el-col :span="6" style="font-weight: bold">{{ $jk -> jklx }}</el-col>
                    <el-col :span="6">合同号</el-col>
                    @if(isset($jk -> hth))
                        <el-col :span="6" style="font-weight: bold">{{ $jk -> hth }}</el-col>
                    @else
                        <el-col :span="6" style="font-weight: bold">暂无信息</el-col>
                    @endif
                </el-row>
                <el-row style="padding: 20px;background-color: rgba(200,200,200,.6); border-radius: 5px;">
                    <el-col :span="6">借款期限</el-col>
                    <el-col :span="6" style="font-weight: bold">{{ $jk -> jkqx }}个月</el-col>
                    <el-col :span="6">借款金额</el-col>
                    <el-col :span="6" style="font-weight: bold">{{ $jk -> jkje }}元</el-col>
                </el-row>
                <el-row style="margin: 20px;">
                    <el-col :span="6">借款时间</el-col>
                    <el-col :span="6" style="font-weight: bold">{{ $jk -> jksj }}</el-col>
                    <el-col :span="6">到期时间</el-col>
                    <el-col :span="6" style="font-weight: bold">{{ \Carbon\Carbon::createFromFormat('Y-m-d', $jk -> jksj)->addMonths($jk->jkqx) -> toDateString() }}</el-col>
                </el-row>
                <el-row style="padding: 20px;background-color: rgba(200,200,200,.6); border-radius: 5px;">
                    <el-col :span="6">利率</el-col>
                    <el-col :span="6" style="font-weight: bold">{{ $jk -> ll }}%</el-col>
                    <el-col :span="6">手续费</el-col>
                    <el-col :span="6" style="font-weight: bold">{{ $jk -> sxf }}%</el-col>
                </el-row>
                <el-row style="margin: 20px;">
                    <el-col :span="6">还款方式</el-col>
                    <el-col :span="6" style="font-weight: bold">{{ $jk -> hkfs }}</el-col>
                    <el-col :span="6">添加人</el-col>
                    <el-col :span="6" style="font-weight: bold">{{ $jk -> user -> name }}</el-col>
                </el-row>
            </el-card>
        </el-col>
    </el-row>

    @include('hk.hk')

@stop

@section('script_vue')

    vm.activeIndex = '2-2'

@stop