@extends('layouts._layouts')

@section('content')

    @include('shared._errors_vue')

    <el-row :gutter="10">
        <el-col :span="12" :offset="6">
            <el-card class="box-card">
                <div slot="header" class="clearfix">
                    <span>添加用户</span>
                </div>

                <el-form ref="user" label-width="80px" :model="user" :rules="userRules" size="mini">
                    {{ csrf_field() }}

                    <el-form-item label="工号" prop="Num">
                        <el-input v-model="user.Num"></el-input>
                    </el-form-item>

                    <el-form-item label="姓名" prop="name">
                        <el-input v-model="user.name"></el-input>
                    </el-form-item>

                    <el-form-item label="密码" prop="password">
                        <el-input type="password" v-model="user.password"></el-input>
                    </el-form-item>

                    <el-form-item label="账号类型" prop="role">
                        <el-select v-model="user.role" placeholder="请选择角色类型" style="width: 100%">
                            <el-option label="业务员" value="业务员"></el-option>
                            <el-option label="审核员" value="审核员"></el-option>
                        </el-select>
                    </el-form-item>

                    <el-form-item>
                        <el-button type="primary" @click="onSubmitPost('{{ route('userAdd') }}', user, 'user')">确认提交</el-button>
                    </el-form-item>

                </el-form>
                @include('shared._message_vue')
                @include('shared._errors_vue')
            </el-card>
        </el-col>
    </el-row>

@stop

@section('script')
    <script>
        $(function () {
            $('#password_new').blur(function () {
                if ( !$('#password').val() == '' && !$('#password_new').val() == '' ) {
                   $('#submit').removeAttr('disabled')
                }
            })
        })
    </script>
@stop