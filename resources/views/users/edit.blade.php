@extends('layouts._layouts')

@section('content')

    @include('shared._errors_vue')

    <el-row :gutter="10">
        <el-col :span="12" :offset="6">
            <el-card class="box-card">
                <div slot="header" class="clearfix">
                    <span>修改信息</span>
                </div>

                {{--<form method="post" action="{{ route('updateUesr') }}">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="Num" class="col-sm-2 col-form-label">工号</label>
                        <input type="text" class="form-control" name="Num" placeholder="{{ \Illuminate\Support\Facades\Auth::user() -> Num }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="name">用户名</label>
                        <input type="text" class="form-control" name="name" placeholder="{{ \Illuminate\Support\Facades\Auth::user() -> name }}">
                    </div>
                    <div class="form-group">
                        <label for="password">原密码</label>
                        <input type="password" class="form-control" name="password" placeholder="请输入原密码">
                    </div>
                    <div class="form-group">
                        <label for="password">新密码</label>
                        <input type="password" class="form-control" name="password_new" placeholder="请输入新密码">
                    </div>
                    <button type="submit" class="btn btn-primary">确认修改</button>
                </form>
--}}

                <el-form ref="form" label-width="80px" method="post" action="{{ route('updateUesr')}}">
                    {{ csrf_field() }}

                    <el-form-item label="工号">
                        <el-input disabled placeholder="{{ \Illuminate\Support\Facades\Auth::user() -> Num }}" name="Num"></el-input>
                    </el-form-item>

                    <el-form-item label="用户名">
                        <el-input disabled placeholder="{{ \Illuminate\Support\Facades\Auth::user() -> name }}" name="name"></el-input>
                    </el-form-item>

                    <el-form-item label="原密码">
                        <el-input type="password" placeholder="请输入原密码" name="password"></el-input>
                    </el-form-item>

                    <el-form-item label="新密码">
                        <el-input type="password" placeholder="请输入新密码" name="password_new"></el-input>
                    </el-form-item>

                <el-form-item>
                    <button class="btn btn-primary" type="submit">提交修改</button>
                </el-form-item>

                {{--</el-form>--}}
                @include('shared._message_vue')
                @include('shared._errors_vue')
            </el-card>
        </el-col>
    </el-row>

@stop

@section('method')
    submit() {
        $this.submit()
    }
@stop