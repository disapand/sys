<el-row :gutter="20" style="margin-top: 20px;">
    <el-col :span="20" :offset="2">

        <el-card>
            <div slot="header" class="clearfix">
                <span>还款信息</span>
                {{-- 管理员可以编辑还款信息 --}}
                {{--<el-button style="float:right" type="primary" @click="tzlj('{{ route('hkEdit', [$jk -> id]) }}')">编辑</el-button>--}}
            </div>
            <template>
                <el-table
                        :data="hk_list"
                        stripe
                        style="width: 100%">
                    <el-table-column
                            prop="id"
                            label="还款编号">
                    </el-table-column>
                    <el-table-column
                            prop="hkje"
                            label="还款金额">
                    </el-table-column>
                    <el-table-column
                            prop="hksj"
                            label="还款时间">
                    </el-table-column>
                    <el-table-column
                            prop="whje"
                            label="未还金额">
                    </el-table-column>
                    <el-table-column
                            prop="khjl"
                            label="客户经理">
                    </el-table-column>

                    @if(\Illuminate\Support\Facades\Auth::user() -> role == '业务员')
                        <el-table-column label="操作">
                            <template slot-scope="scope">
                                <el-button
                                        size="mini"
                                        type="primary"
                                        @click="onSubmit(' {{ url('/hkEdit') }}', scope.row.id, 'show')">编辑还款信息
                                </el-button>
                            </template>
                        </el-table-column>
                    @endif

                </el-table>
            </template>

            <el-row style="margin-top: 50px;">
                <el-form :inline="true" :model="hkxx" :rules="hkxxRules" ref="hkxx" size="mini">
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
                        <el-form-item label="客户经理" prop="khjl">
                            <el-input v-model="hkxx.khjl" placeholder="请输入客户经理">
                            </el-input>
                        </el-form-item>
                        <el-form-item>
                            <el-button type="primary" @click="onSubmitPost('{{ url('/hkCreate') .'/'. $jk -> id }}', hkxx, 'hkxx')">添加还款信息</el-button>
                        </el-form-item>
                    </div>
                </el-form>
            </el-row>

        </el-card>

    </el-col>
</el-row>