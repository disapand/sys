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

                            <el-form ref="jbxx" label-width="100px" :model="jbxx">
                                {{ csrf_field() }}

                                <el-form-item label="姓名">
                                    <el-input v-model="jbxx.name" size="mini"></el-input>
                                </el-form-item>

                                <el-form-item label="手机号">
                                    <el-input v-model="jbxx.tel" size="mini"></el-input>
                                </el-form-item>

                                <el-form-item label="身份证号">
                                    <el-input v-model="jbxx.IDCard" size="mini"></el-input>
                                </el-form-item>

                                <el-form-item label="性别">
                                    <el-radio v-model="jbxx.sex" label="男" size="mini">男</el-radio>
                                    <el-radio v-model="jbxx.sex" label="女" size="mini">女</el-radio>
                                </el-form-item>

                                <el-form-item label="借款类别">
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

                                <el-form-item label="住宅地址">
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

                            <el-form ref="jbxx" label-width="100px" :model="zyxx">
                                {{ csrf_field() }}

                                <el-form-item label="工作单位">
                                    <el-input v-model="zyxx.gzdw"></el-input>
                                </el-form-item>

                                <el-form-item label="单位性质">
                                    <el-input v-model="zyxx.dwxz"></el-input>
                                </el-form-item>

                                <el-form-item label="所属行业">
                                    <el-input v-model="zyxx.sshy"></el-input>
                                </el-form-item>

                                <el-form-item label="任职部门">
                                    <el-input v-model="zyxx.rzbm"></el-input>
                                </el-form-item>

                                <el-form-item label="职位">
                                    <el-input v-model="zyxx.zw"></el-input>
                                </el-form-item>

                                <el-form-item label="入职时间">
                                    <el-date-picker
                                            v-model="zyxx.rzsj"
                                            type="date"
                                            placeholder="选择日期">
                                    </el-date-picker>
                                </el-form-item>

                                <el-form-item label="单位地址">
                                    <el-input v-model="zyxx.dwdz"></el-input>
                                </el-form-item>

                                <el-form-item label="单位电话">
                                    <el-input v-model="zyxx.dwdh"></el-input>
                                </el-form-item>

                                <el-form-item label="任职薪水">
                                    <el-input v-model="zyxx.rzxs"></el-input>
                                </el-form-item>

                                <el-form-item label="总收入">
                                    <el-input v-model="zyxx.zsr"></el-input>
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

                            <el-form ref="jbxx" label-width="180px" :model="lxrxx">
                                {{ csrf_field() }}

                                <el-form-item label="联系人姓名">
                                    <el-input v-model="lxrxx.name"></el-input>
                                </el-form-item>

                                <el-form-item label="和申请人关系">
                                    <el-select v-model="lxrxx.gx" placeholder="请选择">
                                        <el-option label="直系亲属" value="直系亲属"></el-option>
                                        <el-option label="朋友" value="朋友"></el-option>
                                        <el-option label="同事" value="同事"></el-option>
                                        <el-option label="其他" value="其他"></el-option>
                                    </el-select>
                                </el-form-item>

                                <el-form-item label="联系电话">
                                    <el-input v-model="lxrxx.lxdh"></el-input>
                                </el-form-item>

                                <el-form-item label="身份证号">
                                    <el-input v-model="lxrxx.sfzh"></el-input>
                                </el-form-item>

                                <el-form-item label="联系人是否知道此贷款">
                                    <el-radio v-model="lxrxx.dk" label="是">是</el-radio>
                                    <el-radio v-model="lxrxx.dk" label="否">否</el-radio>
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

                            <el-form ref="jbxx" label-width="130px" :model="qtxx">
                                {{ csrf_field() }}

                                <el-form-item label="房产类别">
                                    <el-input v-model="qtxx.fclb"></el-input>
                                </el-form-item>

                                <el-form-item label="购买时间">
                                    <el-date-picker
                                            v-model="qtxx.gmsj"
                                            type="date"
                                            placeholder="选择日期">
                                    </el-date-picker>
                                </el-form-item>

                                <el-form-item label="购买价格">
                                    <el-input v-model="qtxx.gmjg"></el-input>
                                </el-form-item>

                                <el-form-item label="购买方式">
                                    <el-input v-model="qtxx.gmfs"></el-input>
                                </el-form-item>

                                <el-form-item label="购买地址">
                                    <el-input v-model="qtxx.gmdz"></el-input>
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

                            <el-form ref="jbxx" label-width="130px" :model="fjxx">
                                {{ csrf_field() }}

                                <el-form-item label="身份证正面照片">
                                    <el-upload
                                            class="upload-demo"
                                            action="https://jsonplaceholder.typicode.com/posts/"
                                            ref="upload"
                                            {{--:on-preview="handlePreview"--}}
                                            {{--:on-remove="handleRemove"--}}
                                            {{--:file-list="fileList2"--}}
                                            list-type="picture"
                                            :auto-upload="false">
                                        <el-button size="small" type="primary">点击添加</el-button>
                                        <div slot="tip" class="el-upload__tip">只能上传jpg/png文件，且不超过500kb</div>
                                    </el-upload>
                                </el-form-item>

                                <el-form-item label="身份证反面照片">
                                    <el-upload
                                            class="upload-demo"
                                            action="https://jsonplaceholder.typicode.com/posts/"
                                            ref="upload"
                                            {{--:on-preview="handlePreview"
                                            :on-remove="handleRemove"
                                            :file-list="fileList2"--}}
                                            list-type="picture"
                                            :auto-upload="false">
                                        <el-button size="small" type="primary">点击添加</el-button>
                                        <div slot="tip" class="el-upload__tip">只能上传jpg/png文件，且不超过500kb</div>
                                    </el-upload>
                                </el-form-item>
                                <el-form-item label="居住证明照片">
                                    <el-upload
                                            class="upload-demo"
                                            action="https://jsonplaceholder.typicode.com/posts/"
                                            {{--:on-preview="handlePreview"--}}
                                            ref="upload"
                                            {{--:on-remove="handleRemove"--}}
                                            {{--:file-list="fileList2"--}}
                                            list-type="picture"
                                            :auto-upload="false">
                                        <el-button size="small" type="primary">点击添加</el-button>
                                        <div slot="tip" class="el-upload__tip">只能上传jpg/png文件，且不超过500kb</div>
                                    </el-upload>
                                </el-form-item>

                                <el-form-item label="车辆信息照片">
                                    <el-upload
                                            class="upload-demo"
                                            action="https://jsonplaceholder.typicode.com/posts/"
                                            ref="upload"
                                            {{--:on-preview="handlePreview"--}}
                                            {{--:on-remove="handleRemove"--}}
                                            {{--:file-list="fileList2"--}}
                                            list-type="picture"
                                            :auto-upload="false">
                                        <el-button size="small" type="primary">点击添加</el-button>
                                        <div slot="tip" class="el-upload__tip">只能上传jpg/png文件，且不超过500kb</div>
                                    </el-upload>
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
                                        <el-button type="primary" @click="onSubmitPost('{{ route('jbxxCreate') }}', jbxx)">点击上传</el-button>
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