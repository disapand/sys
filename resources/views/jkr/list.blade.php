@extends('layouts._layouts')

@section('css')
    <style>
        .el-table .warning-row {
            background: #F56C6C;
        }

        .el-table .success-row {
            background: #67C23A;
        }
    </style>
@stop

@section('content')
    @include('shared._errors_vue')

    <div style="margin: 15px auto; width: 50%;display: inline-block">
        <el-input placeholder="请输入内容" v-model="query_string" class="input-with-select">
            <el-select v-model="query_condition" slot="prepend" placeholder="请选择" style="width: 130px;">
                <el-option label="借款人姓名" value="借款人姓名"></el-option>
                <el-option label="借款人编号" value="借款人编号"></el-option>
            </el-select>
            <el-button slot="append" icon="el-icon-search" @click="query_jkr">搜索</el-button>
        </el-input>
    </div>

    <a href="#" class="btn btn-primary" style="margin-right: 50px;margin-top: 15px;float: right;"
       download="借款人列表.xls" onclick="return ExcellentExport.excel(this, 'jkr', '借款人列表');">导出excel</a>

    <template>
        <el-row :gutter="10">
            <el-table
                    id="jkr"
                    :data="jkr"
                    style="width: 100%;"
                    border
                    :row-class-name="tableRowClassName">
                <el-table-column
                        prop="id"
                        sortable
                        label="编号"
                        width="80">
                </el-table-column>
                <el-table-column
                        prop="name"
                        label="借款人姓名"
                        sortable
                        width="120">
                </el-table-column>
                <el-table-column
                        prop="jklb"
                        label="借款类型"
                        sortable
                        width="110">
                </el-table-column>
                <el-table-column
                        prop="addr"
                        label="住宅地址">
                </el-table-column>
                <el-table-column
                        prop="jbxx_zt"
                        label="基本信息审核状态"
                        sortable
                        width="100">
                </el-table-column>
                <el-table-column
                        prop="zyxx_zt"
                        label="职业信息审核状态"
                        sortable
                        width="100">
                </el-table-column>
                <el-table-column
                        prop="lxrxx_zt"
                        label="联系人信息审核状态"
                        sortable
                        width="120">
                </el-table-column>
                <el-table-column
                        prop="qtxx_zt"
                        label="其他信息审核状态"
                        sortable
                        width="100">
                </el-table-column>
                <el-table-column
                        prop="fjxx_zt"
                        label="附件信息审核状态"
                        sortable
                        width="100">
                </el-table-column>
                <el-table-column
                        prop="created_at"
                        sortable
                        label="添加时间">
                </el-table-column>
                <el-table-column
                        prop="updated_at"
                        sortable
                        label="修改时间">
                </el-table-column>
                <el-table-column
                        prop="khjl"
                        sortable
                        label="客户经理">
                </el-table-column>
                <el-table-column label="操作">
                    <template slot-scope="scope">
                        <el-button
                                size="mini"
                                type="primary"
                                @click="onSubmit('{{ url('/jkrShow') }}', scope.row.id, 'show')">详情
                        </el-button>
                        @if(\Illuminate\Support\Facades\Auth::user()->role == "管理员")
                            <el-button
                                    size="mini"
                                    type="danger"
                                    @click="onSubmit('{{ url('/jkrDelete') }}', scope.row.id, 'del')">删除
                            </el-button>
                        @endif
                    </template>
                </el-table-column>
            </el-table>

            <el-row style="margin-top: 20px;">
                <el-col :span="8">
                    {{ $jkrs -> links() }}
                </el-col>
            </el-row>

        </el-row>
    </template>

@stop

@section('script')
    <script src="{{ asset('/js/excellentexport.js') }}"></script>
@stop

@section('script_vue')

    vm.activeIndex = '1-2'

    @foreach($jkrs as $jkr)
        vm.jkr.push({id: '{{ $jkr -> id }}', name: '{{ $jkr -> name }}',jklb: '{{ $jkr -> jklb }}',addr: '{{ $jkr -> addr }}',jbxx_zt: '{{ $jkr -> fjxx-> jbxx_zt . ":" . $jkr -> fjxx -> jbxx_yj }}',zyxx_zt: '{{ $jkr -> fjxx-> zyxx_zt. ":" . $jkr -> fjxx -> zyxx_yj  }}',
        lxrxx_zt: '{{ $jkr -> fjxx-> lxrxx_zt. ":" . $jkr -> fjxx -> lxrbxx_yj  }}',qtxx_zt: '{{ $jkr -> fjxx-> qtxx_zt. ":" . $jkr -> fjxx -> qtxx_yj  }}',fjxx_zt: '{{ $jkr -> fjxx-> fjxx_zt . ":" . $jkr -> fjxx -> fjxx_yj }}',created_at: '{{ $jkr -> created_at }}',updated_at: '{{ $jkr -> updated_at }}',
        khjl: '{{ $jkr->fjxx->khjl }}' })
    @endforeach

@stop