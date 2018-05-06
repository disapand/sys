@extends('layouts._layouts')

@section('content')
    @include('shared._errors_vue')

    <div style="margin: 15px auto; width: 50%">
        <el-input placeholder="请输入内容" v-model="query_string" class="input-with-select">
            <el-select v-model="query_condition" slot="prepend" placeholder="请选择" style="width: 130px;">
                <el-option label="借款人姓名" value="借款人姓名"></el-option>
                <el-option label="借款编号" value="借款人编号"></el-option>
            </el-select>
            <el-button slot="append" icon="el-icon-search" @click="query_jk">搜索</el-button>
        </el-input>
    </div>

    <template>
        <el-row :gutter="10">
            <el-table
                    :data="jk_hk"
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
                        prop="name"
                        label="借款人姓名"
                        sortable>
                </el-table-column>
                <el-table-column
                        prop="jklx"
                        label="借款类型"
                        sortable>
                </el-table-column>
                <el-table-column
                        prop="hth"
                        label="合同号">
                </el-table-column>
                <el-table-column
                        prop="jkje"
                        label="借款金额"
                        sortable>
                </el-table-column>
                <el-table-column
                        prop="jksj"
                        label="借款时间"
                        sortable>
                </el-table-column>
                <el-table-column
                        prop="jkqx"
                        label="借款期限"
                        sortable>
                </el-table-column>
                <el-table-column
                        prop="dqsj"
                        label="到期时间"
                        sortable>
                </el-table-column>
                <el-table-column
                        prop="yhlx"
                        label="已还利息"
                        sortable>
                </el-table-column>
                <el-table-column
                        prop="zlx"
                        sortable
                        label="总利息">
                </el-table-column>
                <el-table-column
                        prop="ll"
                        sortable
                        label="利率">
                </el-table-column>
                <el-table-column
                        prop="sxf"
                        sortable
                        label="手续费">
                </el-table-column>
                <el-table-column
                        prop="sfyh"
                        sortable
                        label="是否已还">
                </el-table-column>
                <el-table-column
                        prop="hkfs"
                        sortable
                        label="还款方式">
                </el-table-column>
                <el-table-column label="操作">
                    <template slot-scope="scope">
                        <el-button
                                size="mini"
                                type="primary"
                                @click="onSubmit(' {{ url('/jkShow') }}', scope.row.id, 'show')">详情
                        </el-button>
                    </template>
                </el-table-column>
            </el-table>
        </el-row>
    </template>

@stop

@section('script_vue')

    vm.activeIndex = '2-2'

    @foreach($js as $j)
        vm.jk_hk.push({
            id: '{{ $j -> id }}',
            name: '{{ $j -> jbxx -> name }}',
            jklx: '{{ $j -> jklx }}',
            hth: '{{ $j -> hth }}',
            jkje: '{{ $j -> jkje }}元',
            jksj: '{{ $j -> jksj }}',
            jkqx: '{{ $j -> jkqx }}个月',
            dqsj: '{{ \Carbon\Carbon::createFromFormat('Y-m-d', $j -> jksj)->addMonths($j->jkqx) -> toDateString() }}',
            yhlx: '{{ $j -> hk -> sum('lx') }}元',
            zlx: '{{ round($j -> jkje * ($j -> ll / 100), 2) }}',
            ll: '{{ $j -> ll }}%',
            sxf: '{{ $j -> sxf }}%',
            @if( !$j -> hk -> isEmpty())
                sfyh: '是',
            @else
                sfyh: '否',
            @endif
            hkfs: '{{ $j -> hkfs }}',
        });
    @endforeach

@stop