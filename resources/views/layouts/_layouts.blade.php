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
                activeStep: 0,
                activeTab: '1',
                show:false,
                jbxx: {
                    name:'',
                    tel: '',
                    IDCard: '',
                    sex:'',
                    jklb:'',
                    xl:'',
                    hj:'',
                    addr:'',
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
                    name:'',
                    gx:'',
                    lxdh:'',
                    sfzh:'',
                    dk:'',
                    fclb:'',
                    gmsj:'',
                    gmjg:'',
                    gmfs:'',
                    gmdz:'',
                    fjxx:[],
                },
                jbxxRules: {
                    name:[
                        {required: true, message:'请输入姓名', trigger:'blur'}
                    ],
                    tel:[
                        {required: true, message:'请输入电话', trigger:'blur'}
                    ],
                    IDCard:[
                        {required: true, message:'请输入身份证号', trigger:'blur'}
                    ],
                    sex:[
                        {required: true, message:'请输入性别', trigger:'change'}
                    ],
                    jklb:[
                        {required: true, message:'请选择借款类别', trigger:'change'}
                    ],
                    addr:[
                        {required: true, message:'请输入住宅地址', trigger:'blur'}
                    ],
                    rzsj:[
                        {required: true, message:'请选择入职时间', trigger:'change'}
                    ],
                    dwdz:[
                        {required: true, message:'请输入单位地址', trigger:'blur'}
                    ],
                    dwdh:[
                        {required: true, message:'请输入单位电话', trigger:'blur'}
                    ],
                    rzxs:[
                        {required: true, message:'请输入任职薪水', trigger:'blur'}
                    ],
                    zsr:[
                        {required: true, message:'请输入总收入', trigger:'blur'}
                    ],
                },
                user: {
                  name: '',
                  Num: '',
                  role: '',
                  password: '',
                },
                userRules:{
                    name: [
                        { required: true, message:'请输入姓名', trigger: 'blur' }
                    ],
                    Num: [
                        { required: true, message:'请输入工号', trigger: 'blur' }
                    ],
                    role: [
                        { required: true, message:'请选择账号类型', trigger: 'change' }
                    ],
                    password: [
                        { required: true, message:'请输入密码', trigger: 'blur' }
                    ],
                }
            }
        },
        methods:{
            //vue跳转链接的方法，参数为要跳转的目标地址
            tzlj(mblj) {
                $(window).attr('location', mblj);
            },

            //ajax提交post请求的方法
            onSubmitPost(uri, data, tmp) {
                vm.$refs[tmp].validate( (valid) => {
                    if (valid){
                        $.post(uri, data, function (msg, textStatus, jqXHR) {
                            vm.$message({
                                showClose: true,
                                message: msg.dd,
                                type:msg.statue
                            })
                            vm.$refs[tmp].resetFields()
                            if (tmp == 'jbxx') {
                                {{--window.location.href({{ route('jkrList') }})--}}
                            }
                        }, 'json')
                    } else {
                        vm.$message({
                            showClose: true,
                            message: '请填写完整信息',
                            type: 'error'
                        })
                        return false
                    }
                })
            },

            //
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
            },

            //步骤条点击下一步，tab跟着跳转的方法
            next(){
                if(vm.activeStep ++ > 3) {
                    vm.activeTab = '1'
                    vm.activeStep = 0
                }else{
                    vm.activeTab = vm.activeStep + 1 + ''
                }
            },

            //步骤条点击上一步，tab跟着跳转的方法
            preview(){
                if (vm.activeStep -- < 0) {
                    vm.activeTab = '5'
                    vm.activeStep = 4
                }else {
                    vm.activeTab = vm.activeStep + 1 + ''
                }
            },

            //tab切换，同步步骤条的方法
            handleClick(tab, event){
                vm.activeStep = tab.name - 1
            },
            bfUpload(file){

            },

            //上传图片的方法
            uploadSubmit(){
                vm.$refs.img.submit()
            },
            //图片上传成功的回调方法
            imgUploadSuccess(response, file, fileList){
                vm.activeStep = 5
                $('#jbxxSubmit').removeAttr('disabled').removeClass('is-disabled')
                vm.jbxx.fjxx.push(response.dd)
            },
            uploadSubmit(){
                vm.$refs.img.submit()
            },
            imgUploadError(response, file, fileList){
                // vm.$message(response.status)
            },
        },
        computed: {
                @yield('computed')
        }
    })

    @yield('script_vue')

</script>
</html>