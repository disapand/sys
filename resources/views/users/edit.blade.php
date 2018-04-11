@extends('layouts._layouts')

@section('content')

    @include('shared._errors_vue')

    <el-row :gutter="10">
        <el-col :span="12" :offset="6">
            <el-card class="box-card">
                <div slot="header" class="clearfix">
                    <span>修改信息</span>
                </div>

                <el-form ref="form" label-width="80px" method="post" action="{{ route('updateUesr',[\Illuminate\Support\Facades\Auth::user()])}}">
                    {{ csrf_field() }}

                    <el-form-item label="工号">
                        <el-input disabled placeholder="{{ \Illuminate\Support\Facades\Auth::user() -> Num }}" name="Num"></el-input>
                    </el-form-item>

                    <el-form-item label="用户名">
                        <el-input disabled placeholder="{{ \Illuminate\Support\Facades\Auth::user() -> name }}" name="name"></el-input>
                    </el-form-item>

                    <el-form-item label="原密码">
                        <el-input type="password" placeholder="请输入原密码" name="password" id="password"></el-input>
                    </el-form-item>

                    <el-form-item label="新密码">
                        <el-input type="password" placeholder="请输入新密码" name="password_new" id="password_new"></el-input>
                    </el-form-item>

                <el-form-item>
                    <button class="btn btn-primary" type="submit" id="submit" disabled>提交修改</button>
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