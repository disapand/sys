@extends('layouts._layouts')

@section('content')
    @include('shared._errors_vue')

    <template>
        <el-tabs v-model="activeTab" @tab-click="handleClick">
            <el-tab-pane label="基本信息" name="1">

                <el-row :gutter="10">
                    <el-col :span="12" :offset="6">
                        <el-card class="box-card">
                            <div slot="header" class="clearfix">
                                <span>基本信息</span>
                            </div>

                            <el-form ref="jbxx" label-width="100px" :model="jbxx" size="mini" :rules="jbxxRules">
                                {{ csrf_field() }}

                                <el-form-item label="姓名" prop="name">
                                    <el-input v-model="jbxx.name"></el-input>
                                </el-form-item>

                                <el-form-item label="手机号" prop="tel">
                                    <el-input v-model="jbxx.tel"></el-input>
                                </el-form-item>

                                <el-form-item label="身份证号" prop="IDCard">
                                    <el-input v-model="jbxx.IDCard"></el-input>
                                </el-form-item>

                                <el-form-item label="性别" prop="sex">
                                    <el-radio v-model="jbxx.sex" label="男">男</el-radio>
                                    <el-radio v-model="jbxx.sex" label="女">女</el-radio>
                                </el-form-item>

                                <el-form-item label="借款类别" prop="jklb">
                                    <el-select v-model="jbxx.jklb" placeholder="请选择借款类别">
                                        <el-option label="白领贷" value="白领贷"></el-option>
                                        <el-option label="房贷" value="房贷"></el-option>
                                        <el-option label="信用贷" value="信用贷"></el-option>
                                        <el-option label="精英贷" value="精英贷"></el-option>
                                        <el-option label="房产二次抵押贷" value="房产二次抵押贷"></el-option>
                                        <el-option label="全款房抵押贷" value="全款房抵押贷"></el-option>
                                        <el-option label="税贷" value="税贷"></el-option>
                                    </el-select>
                                </el-form-item>

                                <el-form-item label="学历">
                                    <el-select v-model="jbxx.xl" placeholder="请选择学历">
                                        <el-option label="博士" value="博士"></el-option>
                                        <el-option label="硕士" value="硕士"></el-option>
                                        <el-option label="本科" value="本科"></el-option>
                                        <el-option label="大专" value="大专"></el-option>
                                        <el-option label="其他" value="其他"></el-option>
                                    </el-select>
                                </el-form-item>

                                <el-form-item label="户籍所在地">
                                    <el-input v-model="jbxx.hj"></el-input>
                                </el-form-item>

                                <el-form-item label="住宅地址" prop="addr">
                                    <el-input v-model="jbxx.addr"></el-input>
                                </el-form-item>

                                {{--<el-form-item>--}}
                                    {{--<el-button type="primary" @click="onSubmitPost('{{ route('jbxxCreate') }}', jbxx)">确认提交</el-button>--}}
                                    <el-steps :active="activeStep" finish-status="success" align-center style="margin: 20px 0;">
                                        <el-step title="基本信息"></el-step>
                                        <el-step title="职业信息"></el-step>
                                        <el-step title="联系人信息"></el-step>
                                        <el-step title="其他信息"></el-step>
                                        <el-step title="附件信息"></el-step>
                                    </el-steps>
                                {{--</el-form-item>--}}
                                <el-row style="margin: 20px 0;">
                                    <el-button type="primary" @click="next" style="margin: 0 auto;display: block">下一项</el-button>
                                </el-row>

                            </el-form>
                            @include('shared._message_vue')
                            @include('shared._errors_vue')
                        </el-card>
                    </el-col>
                </el-row>
            </el-tab-pane>

            <el-tab-pane label="职业信息" name="2">
                <el-row :gutter="10">
                    <el-col :span="12" :offset="6">
                        <el-card class="box-card">
                            <div slot="header" class="clearfix">
                                <span>职业信息</span>
                            </div>

                            <el-form ref="jbxx" label-width="100px" :model="jbxx" size="mini" :rules="jbxxRules">
                                {{ csrf_field() }}

                                <el-form-item label="工作单位">
                                    <el-input v-model="jbxx.gzdw"></el-input>
                                </el-form-item>

                                <el-form-item label="单位性质">
                                    <el-input v-model="jbxx.dwxz"></el-input>
                                </el-form-item>

                                <el-form-item label="所属行业">
                                    <el-input v-model="jbxx.sshy"></el-input>
                                </el-form-item>

                                <el-form-item label="任职部门">
                                    <el-input v-model="jbxx.rzbm"></el-input>
                                </el-form-item>

                                <el-form-item label="职位">
                                    <el-input v-model="jbxx.zw"></el-input>
                                </el-form-item>

                                <el-form-item label="入职时间" prop="rzsj">
                                    <el-date-picker
                                            v-model="jbxx.rzsj"
                                            type="date"
                                            value-format="yyyy-MM-dd"
                                            placeholder="选择日期">
                                    </el-date-picker>
                                </el-form-item>

                                <el-form-item label="单位地址" prop="dwdz">
                                    <el-input v-model="jbxx.dwdz"></el-input>
                                </el-form-item>

                                <el-form-item label="单位电话" prop="dwdh">
                                    <el-input v-model="jbxx.dwdh"></el-input>
                                </el-form-item>

                                <el-form-item label="任职薪水" prop="rzxs">
                                    <el-input v-model="jbxx.rzxs"></el-input>
                                </el-form-item>

                                <el-form-item label="总收入" prop="zsr">
                                    <el-input v-model="jbxx.zsr"></el-input>
                                </el-form-item>

                                    <el-steps :active="activeStep" finish-status="success" align-center style="margin: 20px 0;">
                                        <el-step title="基本信息"></el-step>
                                        <el-step title="职业信息"></el-step>
                                        <el-step title="联系人信息"></el-step>
                                        <el-step title="其他信息"></el-step>
                                        <el-step title="附件信息"></el-step>
                                    </el-steps>
                                    <el-row style="margin: 20px 0;">
                                        <div style="display: inline-block; margin-left: 50%; transform: translateX(-50%)">
                                            <el-button type="primary" @click="preview" style>上一项</el-button>
                                            <el-button type="primary" @click="next">下一项</el-button>
                                        </div>
                                    </el-row>

                            </el-form>
                            @include('shared._message_vue')
                            @include('shared._errors_vue')
                        </el-card>
                    </el-col>
                </el-row>
            </el-tab-pane>

            <el-tab-pane label="联系人信息" name="3">
                <el-row :gutter="10">
                    <el-col :span="12" :offset="6">
                        <el-card class="box-card">
                            <div slot="header" class="clearfix">
                                <span>联系人信息</span>
                            </div>

                            <el-form ref="jbxx" label-width="180px" :model="jbxx" size="mini" :rules="jbxxRules">
                                {{ csrf_field() }}

                                <el-form-item label="联系人姓名">
                                    <el-input v-model="jbxx.lxr"></el-input>
                                </el-form-item>

                                <el-form-item label="和申请人关系">
                                    <el-select v-model="jbxx.gx" placeholder="请选择">
                                        <el-option label="直系亲属" value="直系亲属"></el-option>
                                        <el-option label="朋友" value="朋友"></el-option>
                                        <el-option label="同事" value="同事"></el-option>
                                        <el-option label="其他" value="其他"></el-option>
                                    </el-select>
                                </el-form-item>

                                <el-form-item label="联系电话">
                                    <el-input v-model="jbxx.lxdh"></el-input>
                                </el-form-item>

                                <el-form-item label="身份证号">
                                    <el-input v-model="jbxx.sfzh"></el-input>
                                </el-form-item>

                                <el-form-item label="联系人是否知道此贷款">
                                    <el-radio v-model="jbxx.dk" label="是">是</el-radio>
                                    <el-radio v-model="jbxx.dk" label="否">否</el-radio>
                                </el-form-item>

                                <el-steps :active="activeStep" finish-status="success" align-center style="margin: 20px 0;">
                                    <el-step title="基本信息"></el-step>
                                    <el-step title="职业信息"></el-step>
                                    <el-step title="联系人信息"></el-step>
                                    <el-step title="其他信息"></el-step>
                                    <el-step title="附件信息"></el-step>
                                </el-steps>
                                <el-row style="margin: 20px 0;">
                                    <div style="display: inline-block; margin-left: 50%; transform: translateX(-50%)">
                                        <el-button type="primary" @click="preview">上一项</el-button>
                                        <el-button type="primary" @click="next">下一项</el-button>
                                    </div>
                                </el-row>


                            </el-form>
                            @include('shared._message_vue')
                            @include('shared._errors_vue')
                        </el-card>
                    </el-col>
                </el-row>
            </el-tab-pane>


            <el-tab-pane label="其他信息" name="4">
                <el-row :gutter="10">
                    <el-col :span="12" :offset="6">
                        <el-card class="box-card">
                            <div slot="header" class="clearfix">
                                <span>其他信息</span>
                            </div>

                            <el-form ref="jbxx" label-width="130px" :model="jbxx" size="mini" :rules="jbxxRules">
                                {{ csrf_field() }}

                                <el-form-item label="房产类别">
                                    <el-input v-model="jbxx.fclb"></el-input>
                                </el-form-item>

                                <el-form-item label="购买时间">
                                    <el-date-picker
                                            v-model="jbxx.gmsj"
                                            type="date"
                                            value-format="yyyy-MM-dd"
                                            placeholder="选择日期">
                                    </el-date-picker>
                                </el-form-item>

                                <el-form-item label="购买价格">
                                    <el-input v-model="jbxx.gmjg"></el-input>
                                </el-form-item>

                                <el-form-item label="购买方式">
                                    <el-input v-model="jbxx.gmfs"></el-input>
                                </el-form-item>

                                <el-form-item label="购买地址">
                                    <el-input v-model="jbxx.gmdz"></el-input>
                                </el-form-item>

                                <el-steps :active="activeStep" finish-status="success" align-center style="margin: 20px 0;">
                                    <el-step title="基本信息"></el-step>
                                    <el-step title="职业信息"></el-step>
                                    <el-step title="联系人信息"></el-step>
                                    <el-step title="其他信息"></el-step>
                                    <el-step title="附件信息"></el-step>
                                </el-steps>
                                <el-row style="margin: 20px 0;">
                                    <div style="display: inline-block; margin-left: 50%; transform: translateX(-50%)">
                                        <el-button type="primary" @click="preview">上一项</el-button>
                                        <el-button type="primary" @click="next">下一项</el-button>
                                    </div>
                                </el-row>

                            </el-form>
                            @include('shared._message_vue')
                            @include('shared._errors_vue')
                        </el-card>
                    </el-col>
                </el-row>
            </el-tab-pane>


            <el-tab-pane label="附件信息" name="5">
                <el-row :gutter="10">
                    <el-col :span="12" :offset="6">
                        <el-card class="box-card">
                            <div slot="header" class="clearfix">
                                <span>附件信息</span>
                            </div>

                            <el-form ref="jbxx" label-width="130px" :model="jbxx" size="mini">
                                {{ csrf_field() }}

                                <div style="font-size: 14px; text-align: center;margin-bottom: 10px;">
                                    请上传身份证照片、房产证产品等有效证明文件<br>
                                    <em style="color: #ccc;font-style: unset">支持多图上传</em>
                                </div>

                                <el-row style="display: inline-block; margin-left: 50%; transform: translateX(-50%)">
                                        <el-upload
                                                action="{{ route('jbxxCreate') }}"
                                                :before-upload="bfUpload"
                                                name="fjxx"
                                                ref="img"
                                                drag
                                                multiple
                                                :on-success="imgUploadSuccess"
                                                :on-error="imgUploadError"
                                                :auto-upload="false"
                                                list-type="picture">
                                            <i class="el-icon-upload"></i>
                                            <div class="el-upload__text">将文件拖到此处，或<em>点击上传</em></div>
                                        </el-upload>
                                </el-row>

                                <el-steps :active="activeStep" finish-status="success" align-center style="margin: 20px 0;">
                                    <el-step title="基本信息"></el-step>
                                    <el-step title="职业信息"></el-step>
                                    <el-step title="联系人信息"></el-step>
                                    <el-step title="其他信息"></el-step>
                                    <el-step title="附件信息"></el-step>
                                </el-steps>

                                <el-row style="margin: 20px 0;">
                                    <div style="display: inline-block; margin-left: 50%; transform: translateX(-50%)">
                                        <el-button type="primary" @click="preview">上一项</el-button>
                                        <el-button type="primary" @click="uploadSubmit">上传图片</el-button>
                                        <el-button type="primary" @click="onSubmitPost('{{ route('jbxxCreate') }}', jbxx, 'jbxx' )" disabled id="jbxxSubmit" >提交信息</el-button>
                                    </div>
                                </el-row>

                            </el-form>
                            @include('shared._message_vue')
                            @include('shared._errors_vue')
                        </el-card>
                    </el-col>
                </el-row>
            </el-tab-pane>
        </el-tabs>
    </template>



    @stop

@section('script_vue')

    vm.activeIndex = '1-1'

    @stop