@extends('layouts._layouts')

@section('css')
    .el-table .warning-row {
    background: #;
    }

    .el-table .success-row {
    background: #f0f9eb;
    }
    @stop

@section('content')
    @include('shared._errors_vue')

    <div style="margin: 15px auto; width: 50%">
        <el-input placeholder="请输入内容" v-model="query_string" class="input-with-select">
            <el-select v-model="query_condition" slot="prepend" placeholder="请选择" style="width: 130px;">
                <el-option label="借款人姓名" value="借款人姓名"></el-option>
                <el-option label="借款人编号" value="借款人编号"></el-option>
            </el-select>
            <el-button slot="append" icon="el-icon-search" @click="query_jkr">搜索</el-button>
        </el-input>
    </div>

    <template>
        <el-row :gutter="10">
            <el-table
                    :data="jkr"
                    style="width: 100%;"
                    border
                    stripe
                    :row-class-name="tableRowClassName">
                <el-table-column
                        prop="id"
                        label="编号"
                        width="80">
                </el-table-column>
                <el-table-column
                        prop="name"
                        label="借款人姓名"
                        width="100">
                </el-table-column>
                <el-table-column
                        prop="jklb"
                        label="借款类型"
                        width="100">
                </el-table-column>
                <el-table-column
                        prop="addr"
                        label="住宅地址">
                </el-table-column>
                <el-table-column
                        prop="jbxx_zt"
                        label="基本信息审核状态"
                        width="100">
                </el-table-column>
                <el-table-column
                        prop="zyxx_zt"
                        label="职业信息审核状态"
                        width="100">
                </el-table-column>
                <el-table-column
                        prop="lxrxx_zt"
                        label="联系人信息审核状态"
                        width="100">
                </el-table-column>
                <el-table-column
                        prop="qtxx_zt"
                        label="其他信息审核状态"
                        width="100">
                </el-table-column>
                <el-table-column
                        prop="fjxx_zt"
                        label="附件信息审核状态"
                        width="100">
                </el-table-column>
                <el-table-column
                        prop="created_at"
                        label="添加时间">
                </el-table-column>
                <el-table-column
                        prop="updated_at"
                        label="修改时间">
                </el-table-column>
                <el-table-column label="操作">
                    <template slot-scope="scope">
                        <el-button
                                size="mini"
                                type="danger"
                                @click="onSubmit('{{ url('/jkrShow') }}', scope.row.id, 'show')">详情
                        </el-button>
                    </template>
                </el-table-column>
            </el-table>
        </el-row>
    </template>

@stop

@section('script_vue')

    vm.activeIndex = '1-2'

    @foreach($jkrs as $jkr)
        vm.jkr.push({id: '{{ $jkr -> id }}', name: '{{ $jkr -> name }}',jklb: '{{ $jkr -> jklb }}',addr: '{{ $jkr -> addr }}',jbxx_zt: '{{ $jkr -> fjxx-> jbxx_zt }}',zyxx_zt: '{{ $jkr -> fjxx-> zyxx_zt }}',
        lxrxx_zt: '{{ $jkr -> fjxx-> lxrxx_zt }}',qtxx_zt: '{{ $jkr -> fjxx-> qtxx_zt }}',fjxx_zt: '{{ $jkr -> fjxx-> fjxx_zt }}',created_at: '{{ $jkr -> created_at }}',updated_at: '{{ $jkr -> updated_at }}'})
    @endforeach

@stop