@extends('layouts._layouts')

@section('content')

    @include('shared._errors_vue')

    <el-row :gutter="10">
        <el-col :span="12" :offset="6">
            <el-card class="box-card">
                <div slot="header" class="clearfix">
                    <span>添加借款</span>
                </div>

                <el-form ref="jk" label-width="80px" :model="jk" :rules="jkRules" size="mini">
                    {{ csrf_field() }}

                    <el-form-item label="借款人" prop="jbxx_id">
                        <el-input disabled v-model="jk.jbxx_id"></el-input>
                    </el-form-item>

                    <el-form-item label="借款类型" prop="jklx">
                        <el-select v-model="jk.jklx" placeholder="请选择借款类型">
                            <el-option label="白领贷" value="白领贷"></el-option>
                            <el-option label="房贷" value="房贷"></el-option>
                            <el-option label="信用贷" value="信用贷"></el-option>
                            <el-option label="精英贷" value="精英贷"></el-option>
                            <el-option label="房产二次抵押贷" value="房产二次抵押贷"></el-option>
                            <el-option label="全款房抵押贷" value="全款房抵押贷"></el-option>
                            <el-option label="税贷" value="税贷"></el-option>
                        </el-select>
                    </el-form-item>

                    <el-form-item label="合同号">
                        <el-input type="text" v-model="jk.hth"></el-input>
                    </el-form-item>

                    <el-row>
                        <el-col :span="12">
                            <el-form-item label="借款期限" prop="jkqx">
                                <el-select v-model="jk.jkqx" placeholder="请选择借款期限" style="width: 100%">
                                    <el-option label="0.5" value="0.5"></el-option>
                                    <el-option label="1" value="1"></el-option>
                                    <el-option label="2" value="2"></el-option>
                                    <el-option label="3" value="3"></el-option>
                                    <el-option label="4" value="4"></el-option>
                                    <el-option label="5" value="5"></el-option>
                                    <el-option label="6" value="6"></el-option>
                                    <el-option label="7" value="7"></el-option>
                                    <el-option label="8" value="8"></el-option>
                                    <el-option label="9" value="9"></el-option>
                                    <el-option label="10" value="10"></el-option>
                                    <el-option label="11" value="11"></el-option>
                                    <el-option label="12" value="12"></el-option>
                                </el-select>
                            </el-form-item>
                        </el-col>
                        <el-col :span="10" :offset="1">
                            <span>单位：月</span>
                        </el-col>
                    </el-row>

                    <el-row>
                        <el-col :span="12">
                            <el-form-item label="借款金额" prop="jkje">
                                <el-input type="text" v-model="jk.jkje"></el-input>
                            </el-form-item>
                        </el-col>
                        <el-col :span="10" :offset="1">
                            <span style="color: red">大写：@{{ changeNumMoneyToChinese }}</span>
                        </el-col>
                    </el-row>

                    <el-row>
                        <el-col :span="12">
                            <el-form-item label="利率" prop="ll">
                                <el-input type="text" v-model="jk.ll"></el-input>
                            </el-form-item>
                        </el-col>
                        <el-col :span="10" :offset="1">
                            <span>%</span>
                        </el-col>
                    </el-row>

                    <el-row>
                        <el-col :span="12">
                            <el-form-item label="手续费" prop="sxf">
                                <el-input type="text" v-model="jk.sxf"></el-input>
                            </el-form-item>
                        </el-col>
                        <el-col :span="10" :offset="1">
                            <span>%</span>
                        </el-col>
                    </el-row>


                    <el-form-item label="借款时间" prop="jksj">
                        <el-date-picker
                                v-model="jk.jksj"
                                type="date"
                                value-format="yyyy-MM-dd"
                                placeholder="选择日期">
                        </el-date-picker>
                    </el-form-item>

                    <el-form-item label="还款方式" prop="hkfs">
                        <el-select v-model="jk.hkfs" placeholder="请选择还款方式">
                            <el-option label="付息还本" value="付息还本"></el-option>
                            <el-option label="到期本息" value="到期本息"></el-option>
                        </el-select>
                    </el-form-item>

                    <el-form-item>
                        <el-button type="warning" @click="back">取消编辑</el-button>
                        <el-button type="primary" @click="onSubmitPost('{{ url('/jkUpdate/'.$jk -> id) }}', jk, 'jk')">更新信息</el-button>
                    </el-form-item>

                </el-form>
                @include('shared._message_vue')
                @include('shared._errors_vue')
            </el-card>
        </el-col>
    </el-row>

@stop

@section('script_vue')

    vm.activeIndex = '2-1'
    vm.jk.jbxx_id = '{{ urldecode($jk -> jbxx -> name) }}'
    vm.jk.jklx = '{{ urldecode($jk -> jklx) }}'
    vm.jk.hth = '{{ urldecode($jk -> hth) }}'
    vm.jk.jkqx = '{{ urldecode($jk -> jkqx) }}'
    vm.jk.jkje = '{{ urldecode($jk -> jkje) }}'
    vm.jk.ll = '{{ urldecode($jk -> ll) }}'
    vm.jk.sxf = '{{ urldecode($jk -> sxf) }}'
    vm.jk.jksj = '{{ urldecode($jk -> jksj) }}'
    vm.jk.hkfs = '{{ urldecode($jk -> hkfs) }}'

@stop