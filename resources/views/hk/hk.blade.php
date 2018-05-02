<el-row :gutter="20" style="margin-top: 20px;">
    <el-col :span="20" :offset="2">

        <el-card>
            <div slot="header" class="clearfix">
                <span>还款信息</span>
                {{--<el-button style="float:right" type="primary" @click="tzlj()">编辑</el-button>--}}
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
                            prop="hkqs"
                            label="还款期数">
                    </el-table-column>
                    <el-table-column
                            prop="hkbj"
                            label="已还本金">
                    </el-table-column>
                    <el-table-column
                            prop="hklx"
                            label="已还利息">
                    </el-table-column>
                </el-table>
            </template>

            <el-row style="margin-top: 50px;">
                <el-form :inline="true" :model="hkxx" :rules="hkxxRules" ref="hkxx">
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
                        <el-form-item>
                            <el-button type="primary" @click="onSubmitPost('{{ route('hkCreate') }}', hkxx, 'hkxx')">添加还款信息</el-button>
                        </el-form-item>
                    </div>
                </el-form>
            </el-row>

        </el-card>

    </el-col>
</el-row>