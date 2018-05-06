@extends('layouts._layouts')

@section('content')

    @include('shared._errors_vue')

    <el-row :gutter="10">
        <el-col :span="12" :offset="6">
            <el-card class="box-card">
                <div slot="header" class="clearfix">
                    <span>编辑还款信息</span>
                </div>

                <el-form :model="hkxx" :rules="hkxxRules" ref="hkxx" size="mini" label-width="80px">
                    <div>
                        <el-form-item label="还款金额" prop="hkje">
                            <el-input v-model="hkxx.hkje">
                                <template slot="append">元</template>
                            </el-input>
                        </el-form-item>
                        <el-form-item label="本金" prop="bj">
                            <el-input v-model="hkxx.bj">
                                <template slot="append">元</template>
                            </el-input>
                        </el-form-item>
                        <el-form-item label="利息" prop="lx">
                            <el-input v-model="hkxx.lx">
                                <template slot="append">元</template>
                            </el-input>
                        </el-form-item>
                        <el-form-item label="未还金额" prop="whje">
                            <el-input v-model="hkxx.whje">
                                <template slot="append">元</template>
                            </el-input>
                        </el-form-item>
                        <el-form-item label="还款时间" prop="hksj">
                            <el-date-picker
                                    v-model="hkxx.hksj"
                                    type="date"
                                    value-format="yyyy-MM-dd"
                                    placeholder="选择日期">
                            </el-date-picker>
                        </el-form-item>
                        <el-form-item label="客户经理" prop="khjl">
                            <el-input v-model="hkxx.khjl" placeholder="请输入客户经理">
                            </el-input>
                        </el-form-item>
                        <el-form-item>
                            <el-button type="warning" @click="back">取消编辑</el-button>
                            <el-button type="primary" @click="onSubmitPost('{{ url('/hkUpdate') .'/'. $hk -> id }}', hkxx, 'hkxx')">修改还款信息</el-button>
                        </el-form-item>
                    </div>
                </el-form>

                </el-form>
                @include('shared._message_vue')
                @include('shared._errors_vue')
            </el-card>
        </el-col>
    </el-row>

@stop

@section('script_vue')

    vm.activeIndex = '3-2'
    vm.hkxx.hkje = '{{ urldecode($hk -> hkje) }}'
    vm.hkxx.bj = '{{ urldecode($hk -> bj) }}'
    vm.hkxx.lx = '{{ urldecode($hk -> lx) }}'
    vm.hkxx.khjl = '{{ urldecode($hk -> khjl) }}'
    vm.hkxx.whje = '{{ urldecode($hk -> whje) }}'
    vm.hkxx.hksj = '{{ urldecode($hk -> hksj) }}'

@stop