<!doctype html>
<html lang="{{ $app -> getLocale() }}" style="height: 100%;width: 100%">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', '借贷管理系统')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script rel="{{ asset('js/app.js') }}"></script>

    {{--引入element-ui--}}
    <link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">
    {{--<link rel="stylesheet" href="{{ asset('css/elementui.css') }}">--}}
    <style>
        .el-header {
            padding: 0;
        }
        @yield('css')
    </style>

</head>
<body style="height: 100%;width: 100%">
<div id="app" style="height: 100%;width: 100%">
    <el-container style="height: 100%;width: 100%">
        <el-aside width="200px">@include('layouts._aside')</el-aside>

        <el-container>
            <el-header>@include('layouts._header')</el-header>
            <el-main>
                @yield('content')
            </el-main>
        </el-container>
    </el-container>
</div>
</body>
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
@yield('script')
<script src="https://unpkg.com/vue/dist/vue.js"></script>
<script src="https://unpkg.com/element-ui/lib/index.js"></script>
{{--<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/vue.js') }}"></script>
<script src="{{ asset('js/elementui.js') }}"></script>--}}
<script>
    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

    let vm = new Vue({
        el: '#app',
        data: function () {
            return {
                show: true,
                usersData: [],
                activeIndex:'',
                jbxx: {
                    name:'',
                    tel: '',
                    IDCard: '',
                    sex:'',
                    jklb:'',
                    xl:'',
                    hj:'',
                    addr:'',
                },
                zyxx: {
                    gzdw:'',
                    dwxz:'',
                    sshy:'',
                    rzbm:'',
                    zw:'',
                    rzsj:'',
                    dwdz:'',
                    dwdh:'',
                    rzxs:'',
                    zsr:'',
                },
                lxrxx: {
                    name:'',
                    gx:'',
                    lxdh:'',
                    sfzh:'',
                    dk:'',
                },
                qtxx: {
                    fclb:'',
                    gmsj:'',
                    gmjg:'',
                    gmfs:'',
                    gmdz:'',
                },
                fjxx: {

                },
                user: {
                  name: '',
                  Num: '',
                  role: '',
                  password: '',
                },
            }
        },
        methods:{
            tzlj(mblj) {
                $(window).attr('location', mblj);
            },
            onSubmitPost(uri, data) {
                $.post(uri, data, function (msg) {
                    vm.$message({
                        showClose: true,
                        message: msg.dd,
                        type:msg.statue
                    })
                    window.location.reload()
                }, 'json')
            },
            onSubmit(uri, data, action) {
                uri = uri + '/' + data
                //如果是删除则执行
                if ( action == 'del'){
                    vm.$confirm('此操作将永久删除信息，是否继续？', '警告', {
                        confirmButtonText: '确定',
                        cancelButtonText:'取消',
                        type: 'warning'
                    }).then(() => {
                        $.post(uri, function (msg) {
                            vm.$message({
                                showClose: true,
                                message: msg.dd,
                                type:msg.statue
                            })
                            window.location.reload()
                        })
                    }).catch(() =>{
                        vm.$message({
                            showClose: true,
                            type:'info',
                            message:'取消删除'
                        })
                    })
                } else if(action = 'show') {

                }
            }
        },
        computed: {
                @yield('computed')
        }
    })

    @yield('script_vue')

</script>
</html>