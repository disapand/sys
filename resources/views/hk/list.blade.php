@extends('layouts._layouts')

@section('content')
    @include('shared._errors_vue')

    <div style="margin: 15px auto; width: 50%;display: inline-block">
        <el-input placeholder="请输入内容" v-model="query_string" class="input-with-select">
            <el-select v-model="query_condition" slot="prepend" placeholder="请选择" style="width: 130px;">
                <el-option label="借款人姓名" value="借款人姓名"></el-option>
                <el-option label="借款编号" value="借款人编号"></el-option>
            </el-select>
            <el-button slot="append" icon="el-icon-search" @click="query_hk">搜索</el-button>
        </el-input>
    </div>

    <a href="#" class="btn btn-primary" style="margin-right: 50px;margin-top: 15px;float: right;"
       download="还款列表.xls" onclick="return ExcellentExport.excel(this, 'hk', '还款列表');">导出excel</a>

    <template>
        <el-row :gutter="10">
            <el-table
                    id="hk"
                    :data="hklb"
                    style="width: 100%;"
                    stripe
                    :default-sort = "{prop: 'id', order: 'ascending'}">
                <el-table-column
                        prop="id"
                        sortable
                        label="编号"
                        width="80">
                </el-table-column>
                <el-table-column
                        prop="jkbh"
                        sortable
                        label="借款编号"
                        width="100">
                </el-table-column>
                <el-table-column
                        prop="name"
                        label="借款人"
                        sortable>
                </el-table-column>
                <el-table-column
                        prop="hkje"
                        label="还款金额">
                </el-table-column>
                <el-table-column
                        prop="hksj"
                        label="还款时间"
                        sortable>
                </el-table-column>
                <el-table-column
                        prop="whje"
                        label="未还金额"
                        sortable>
                </el-table-column>
                <el-table-column
                        prop="khjl"
                        label="客户经理"
                        sortable>
                </el-table-column>
                <el-table-column label="操作">
                    <template slot-scope="scope">
                        <el-button
                                size="mini"
                                type="primary"
                                @click="onSubmit(' {{ url('/jkShow') }}', scope.row.jkbh, 'show')">详情
                        </el-button>
                    </template>
                </el-table-column>
            </el-table>
        </el-row>
    </template>

    <el-row style="margin-top: 20px;">
        <el-col :span="8">
            {{ $hk -> links() }}
        </el-col>
    </el-row>

@stop

@section('script')
    <script src="{{ asset('/js/excellentexport.js') }}"></script>
@stop

@section('script_vue')

    vm.activeIndex = '3-2'

    @foreach($hk as $j)
        vm.hklb.push({
            id: '{{ $j -> id }}',
            jkbh: '{{ $j -> jkbh }}',
            name: '{{ $j -> jk -> jbxx -> name }}',
            hkje: '{{ $j -> hkje }}元',
            hksj: '{{ $j -> hksj }}',
            whje: '{{ $j -> whje }}元',
            khjl: '{{ $j -> khjl }}',
            jkqx: '{{ $j -> jkqx }}个月',
        });
    @endforeach

@stop