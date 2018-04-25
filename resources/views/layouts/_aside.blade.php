<div style="height: 100%;width: 100%;">
    <el-col :span="24" style='height: 100%;'>
        <el-menu
                class="el-menu-vertical-demo"
                :default-active="activeIndex"
                style="border:none;height: 100%;"
                background-color="#545c64"
                text-color="#fff"
                unique-opened
                active-text-color="#ffd04b">
            <el-menu-item index="1">
                <img src="{{ asset('images/logo.png') }}" alt="">
            </el-menu-item>
            <el-menu-item index="1">
                <i class="el-icon-menu"></i>
                <span slot="title">首页</span>
            </el-menu-item>
            <el-submenu index="2">
                <template slot="title">
                    <i class="el-icon-edit"></i>
                    <span>借款人管理</span>
                </template>
                @if(\Illuminate\Support\Facades\Auth::user() -> role == '业务员')
                    <el-menu-item index="1-1" @click="tzlj('{{ route('jkrCreate') }}')">添加借款人</el-menu-item>
                @endif
                <el-menu-item index="1-2" @click="tzlj('{{ route('jkrList') }}')">借款人列表</el-menu-item>
            </el-submenu>
            <el-submenu index="3">
                <template slot="title">
                    <i class="el-icon-edit-outline"></i>
                    <span>借款管理</span>
                </template>
                <el-menu-item index="2-1" @click="tzlj(' {{ route('jk') }} ')">添加借款</el-menu-item>
                <el-menu-item index="2-2" @click="tzlj(' {{ route('jkList') }}')">借款列表</el-menu-item>
            </el-submenu>
            <el-submenu index="4">
                <template slot="title">
                    <i class="el-icon-location"></i>
                    <span>还款管理</span>
                </template>
                <el-menu-item index="3-1">添加还款</el-menu-item>
                <el-menu-item index="3-2">还款列表</el-menu-item>
            </el-submenu>
        </el-menu>
    </el-col>
</div>