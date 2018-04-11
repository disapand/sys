@extends('layouts._layouts')

@section('content')
    @include('shared._errors_vue')

    <template>
        <el-tabs value="first">
            <el-tab-pane label="基本信息" name="first">

                <el-row :gutter="10">
                    <el-col :span="12" :offset="6">
                        <el-card class="box-card">
                            <div slot="header" class="clearfix">
                                <span>基本信息</span>
                            </div>

                            <el-form ref="jbxx" label-width="80px" :model="jbxx">
                                {{ csrf_field() }}

                                <el-form-item label="姓名">
                                    <el-input v-model="jbxx.name"></el-input>
                                </el-form-item>

                                <el-form-item label="手机号">
                                    <el-input v-model="jbxx.tel"></el-input>
                                </el-form-item>

                                <el-form-item label="身份证号">
                                    <el-input v-model="jbxx.IDCard"></el-input>
                                </el-form-item>

                                <el-form-item>
                                    <el-button type="primary" @click="onSubmitPost('{{ route('jbxxCreate') }}', jbxx)">确认提交</el-button>
                                </el-form-item>

                            </el-form>
                            @include('shared._message_vue')
                            @include('shared._errors_vue')
                        </el-card>
                    </el-col>
                </el-row>

            </el-tab-pane>
            <el-tab-pane label="配置管理" name="second">

            </el-tab-pane>
            <el-tab-pane label="角色管理" name="third">

            </el-tab-pane>
            <el-tab-pane label="定时任务补偿" name="fourth">

            </el-tab-pane>
        </el-tabs>
    </template>



    @stop

@section('script_vue')

    vm.activeIndex = '1-1'

    @stop