<el-menu
        class="el-menu-demo"
        mode="horizontal"
        background-color="#545c64"
        text-color="#fff"
        active-text-color="#ffd04b">
    <el-submenu index="1" style="float:right">
        <template slot="title">{{ \Illuminate\Support\Facades\Auth::user() -> name }}</template>
        <el-menu-item index="1-1"><a href="{{ route('editUser') }}" class="btn btn-block btn-info">修改信息</a></el-menu-item>
        <el-menu-item index="1-2">
            <form action="{{ route('logout') }}" method="post">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-block btn-danger">退出登录</button>
            </form>
        </el-menu-item>
    </el-submenu>
    @if(\Illuminate\Support\Facades\Auth::user()->role === 'admin')
        <el-menu-item index="2" style="float:right;">
            <a href="{{ route('userList') }}" style="text-decoration: none;display: inline-block">用户管理</a>
        </el-menu-item>
    @endif
</el-menu>