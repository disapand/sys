@extends('layouts._layouts')

@section('content')
    <el-row :gutter="10">
        <el-col :span="12" :offset="6">
            <el-card class="box-card">
                <div slot="header" class="clearfix">
                    <span>用户列表</span>
                    <el-button style="float: right; margin-right: 20px; " type="primary" size="mini" @click="tzlj(' {{ route('userAdd') }}')">新增用户</el-button>
                </div>
                <template>
                    <el-table
                            :data="usersData"
                            style="width: 100%"
                            stripe
                            :default-sort = "{prop: 'Num', order: 'ascending'}">
                        <el-table-column
                                prop="id"
                                label="编号"
                                sortable>
                        </el-table-column>
                        <el-table-column
                                prop="Num"
                                label="工号"
                                sortable>
                        </el-table-column>
                        <el-table-column
                                prop="name"
                                label="姓名"
                                sortable>
                        </el-table-column>

                        <el-table-column
                                prop="role"
                                label="角色"
                                sortable>
                        </el-table-column>

                        <el-table-column label="操作">
                            <template slot-scope="scope">
                                <el-button
                                        size="mini"
                                        type="danger"
                                        @click="onSubmit('{{ url('/userDelete') }}', scope.row.id, 'del')">删除
                                </el-button>
                            </template>
                        </el-table-column>

                    </el-table>
                </template>
            </el-card>
        </el-col>
    </el-row>
@stop

@section('script_vue')
    @foreach( $users as $user)
        vm.usersData.push({id:'{{ $user->id }}', Num: '{{ $user->Num }}', name: '{{ $user->name }}', role:'{{ $user->role }}'})
    @endforeach
@stop