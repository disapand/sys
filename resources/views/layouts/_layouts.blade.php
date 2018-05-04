<!doctype html>
<html lang="{{ $app -> getLocale() }}" style="height: 100%;width: 100%">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', '借贷管理系统')</title>
    <script rel="{{ asset('/js/app.js') }}"></script>

    {{--引入element-ui--}}
    <link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
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
                jkr: [],
                activeIndex: '',
                activeStep: 0,
                activeTab: '1',
                show: false,
                query_string: '',
                query_condition: '借款人编号',
                jbxx: {
                    name: '',
                    tel: '',
                    IDCard: '',
                    sex: '',
                    jklb: '',
                    xl: '',
                    hj: '',
                    addr: '',
                    gzdw: '',
                    dwxz: '',
                    sshy: '',
                    rzbm: '',
                    zw: '',
                    rzsj: '',
                    dwdz: '',
                    dwdh: '',
                    rzxs: '',
                    zsr: '',
                    lxr: '',
                    gx: '',
                    lxdh: '',
                    sfzh: '',
                    dk: '',
                    lxr2: '',
                    gx2: '',
                    lxdh2: '',
                    sfzh2: '',
                    dk2: '',
                    lxr3: '',
                    gx3: '',
                    lxdh3: '',
                    sfzh3: '',
                    dk3: '',
                    lxr4: '',
                    gx4: '',
                    lxdh4: '',
                    sfzh4: '',
                    dk4: '',
                    fclb: '',
                    gmsj: '',
                    gmjg: '',
                    gmfs: '',
                    gmdz: '',
                    khjl: '',
                    fjxx: [],
                },
                sh: {
                    shyj: '无',
                },
                jbxxRules: {
                    name: [
                        {required: true, message: '请输入姓名', trigger: 'blur'}
                    ],
                    tel: [
                        {required: true, message: '请输入电话号码', trigger: 'blur'},
                        {min: 11, max: 11, message: '请输入正确的电话号码', trigger: 'blur'}
                    ],
                    IDCard: [
                        {required: true, message: '请输入身份证号', trigger: 'blur'},
                        {min: 18, max: 18, message: '请输入正确的身份证号', trigger: 'blur'}
                    ],
                    sex: [
                        {required: true, message: '请输入性别', trigger: 'change'}
                    ],
                    jklb: [
                        {required: true, message: '请选择借款类别', trigger: 'change'}
                    ],
                    addr: [
                        {required: true, message: '请输入住宅地址', trigger: 'blur'}
                    ],
                    zsr: [
                        {required: true, message: '请输入总收入', trigger: 'blur'}
                    ],
                    lxdh: [
                        {min: 11, max: 11, message: '请输入正确的电话号码', trigger: 'blur'}
                    ],
                    sfzh: [
                        {min: 18, max: 18, message: '请输入正确的身份证号', trigger: 'blur'}
                    ],
                    khjl:[
                        {required: true, message: '请填写客户经理信息', trigger: 'blur'}
                    ]
                },
                user: {
                    name: '',
                    Num: '',
                    role: '',
                    password: '',
                },
                userRules: {
                    name: [
                        {required: true, message: '请输入姓名', trigger: 'blur'}
                    ],
                    Num: [
                        {required: true, message: '请输入工号', trigger: 'blur'}
                    ],
                    role: [
                        {required: true, message: '请选择账号类型', trigger: 'change'}
                    ],
                    password: [
                        {required: true, message: '请输入密码', trigger: 'blur'}
                    ],
                },
                jkr_list:[],
                jk:{
                    jbxx_id: '',
                    jklx: '',
                    jkqx: '',
                    jkje: '',
                    hth: '',
                    ll: '',
                    sxf: '',
                    jksj: '',
                    hkfs: '',
                },
                jk_hk: [],
                jkRules:{
                    jbxx_id:[
                        {required:true, message: '请选择借款人', trigger: 'blur'}
                    ],
                    jklx:[
                        {required:true, message: '请选择借款类型', trigger: 'blur'}
                    ],
                    jkxq:[
                        {required:true, message: '请选择借款期限', trigger: 'blur'}
                    ],
                    jkje:[
                        {required:true, message: '请输入借款金额', trigger: 'blur'}
                    ],
                    ll:[
                        {required:true, message: '请输入利率', trigger: 'blur'}
                    ],
                    sxf:[
                        {required:true, message: '请输入手续费', trigger: 'blur'}
                    ],
                    jksj:[
                        {required:true, message: '请选择借款时间', trigger: 'blur'}
                    ],
                    hkfs:[
                        {required:true, message: '请选择还款方式', trigger: 'blur'}
                    ],
                },
                hk_list:[],
                hkxx:{
                    hkje:'',
                    bj:'',
                    lx:'',
                },
                hkxxRules:{
                    hkje:[
                        {required: true, message:'请输入还款金额', trigger: 'blur'}
                    ],
                    bj:[
                        {required: true, message:'请输入本次还款本金', trigger: 'blur'}
                    ],
                    lx:[
                        {required: true, message:'请输入本次还款利息', trigger: 'blur'}
                    ],
                },
            }
        },
        methods: {
            //vue跳转链接的方法，参数为要跳转的目标地址
            tzlj(mblj) {
                $(window).attr('location', mblj);
            },

            //ajax提交post请求的方法
            onSubmitPost(uri, data, tmp) {
                vm.$refs[tmp].validate((valid) => {
                    if (valid) {
                        $.post(uri, data, function (msg, textStatus, jqXHR) {
                            console.log(msg)
                            vm.$message({
                                showClose: true,
                                message: msg.dd,
                                type: msg.statue
                            })
                            vm.$refs[tmp].resetFields()
                            {{--if (tmp == 'jbxx') {--}}
                                {{--window.location.href({{ route('jkrList') }})--}}
                            {{--}--}}
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
                if (action == 'del') {
                    vm.$confirm('此操作将永久删除信息，是否继续？', '警告', {
                        confirmButtonText: '确定',
                        cancelButtonText: '取消',
                        type: 'warning'
                    }).then(() => {
                        $.post(uri, function (msg) {
                            console.log(msg)
                            vm.$message({
                                showClose: true,
                                message: msg.dd,
                                type: msg.statue
                            })
                            window.location.reload()
                        })
                    }).catch(() => {
                        vm.$message({
                            showClose: true,
                            type: 'info',
                            message: '取消删除'
                        })
                    })
                } else if (action = 'show') {
                    window.location.href = uri
                }
            },

            //步骤条点击下一步，tab跟着跳转的方法
            next() {
                if (vm.activeStep++ > 3) {
                    vm.activeTab = '1'
                    vm.activeStep = 0
                } else {
                    vm.activeTab = vm.activeStep + 1 + ''
                }
            },

            //步骤条点击上一步，tab跟着跳转的方法
            preview() {
                if (vm.activeStep-- < 0) {
                    vm.activeTab = '5'
                    vm.activeStep = 4
                } else {
                    vm.activeTab = vm.activeStep + 1 + ''
                }
            },

            //tab切换，同步步骤条的方法
            handleClick(tab, event) {
                vm.activeStep = tab.name - 1
            },
            bfUpload(file) {

            },

            //上传图片的方法
            uploadSubmit() {
                vm.$refs.img.submit()
            },
            //图片上传成功的回调方法
            imgUploadSuccess(response, file, fileList) {
                vm.activeStep = 5
                $('#jbxxSubmit').removeAttr('disabled').removeClass('is-disabled')
                vm.jbxx.fjxx.push(response.dd)
            },
            uploadSubmit() {
                vm.$refs.img.submit()
            },
            imgUploadError(response, file, fileList) {
                vm.$message(response)
            },
            //修改对应行的颜色
            tableRowClassName({row, rowIndex}) {
                console.log(row.jbxx_zt.indexOf('审核通过'))
                if (row.jbxx_zt.indexOf('审核不通过') > -1 || row.zyxx_zt.indexOf('审核不通过') > -1  || row.lxrxx_zt.indexOf('审核不通过') > -1 || row.qtxx_zt.indexOf('审核不通过') > -1 || row.fjxx_zt.indexOf('审核不通过') > -1) {
                    return 'warning-row'
                } else if (row.jbxx_zt.indexOf('审核通过') > -1 && row.zyxx_zt.indexOf('审核通过') > -1 && row.lxrxx_zt.indexOf('审核通过') > -1 && row.qtxx_zt.indexOf('审核通过') > -1 && row.fjxx_zt.indexOf('审核通过') > -1 ) {
                    return 'success-row'
                }
            },
            query_jkr() {
                $.get("{{ url('/jkrQuery')}}" + "/" + vm.query_condition + "/queryString/" + vm.query_string, function (data, statue) {
                    vm.jkr = data
                    console.log(data)
                })
            },
            query_jk() {
                $.get("{{ url('/jkQuery')}}" + "/" + vm.query_condition + "/queryString/" + vm.query_string, function (data, statue) {
                    vm.jk_hk = data
                    console.log(data)
                })
            },
            tjsh(jbxx, data, sort, zt){
                $.post("{{ url('/jkrSh') }}" + "/" + vm.sh.shyj + "/jbxx/" + jbxx +  "/sort/" + sort + "/zt/" + zt, data, function (data, statue) {
                    console.log(data)
                    vm.$message({
                        showClose: true,
                        type: data.statue,
                        message: data.dd
                    })
                })
            },
            back() {
                history.back(-1)
            },
        },

        computed: {
            changeNumMoneyToChinese( ) {
                var cnNums = new Array("零", "壹", "贰", "叁", "肆", "伍", "陆", "柒", "捌", "玖"); //汉字的数字
                var cnIntRadice = new Array("", "拾", "佰", "仟"); //基本单位
                var cnIntUnits = new Array("", "万", "亿", "兆"); //对应整数部分扩展单位
                var cnDecUnits = new Array("角", "分", "毫", "厘"); //对应小数部分单位
                var cnInteger = "整"; //整数金额时后面跟的字符
                var cnIntLast = "元"; //整型完以后的单位
                var maxNum = 999999999999999.9999; //最大处理的数字
                var IntegerNum; //金额整数部分
                var DecimalNum; //金额小数部分
                var ChineseStr = ""; //输出的中文金额字符串
                var parts; //分离金额后用的数组，预定义
                if (vm.jk.jkje == "") {
                    return "零元整";
                }
                money = parseFloat(vm.jk.jkje);
                if (money >= maxNum) {
                    alert('超出最大处理数字');
                    return "";
                }
                if (money == 0) {
                    ChineseStr = cnNums[0] + cnIntLast + cnInteger;
                    return ChineseStr;
                }
                money = money.toString(); //转换为字符串
                if (money.indexOf(".") == -1) {
                    IntegerNum = money;
                    DecimalNum = '';
                } else {
                    parts = money.split(".");
                    IntegerNum = parts[0];
                    DecimalNum = parts[1].substr(0, 4);
                }
                if (parseInt(IntegerNum, 10) > 0) { //获取整型部分转换
                    var zeroCount = 0;
                    var IntLen = IntegerNum.length;
                    for (var i = 0; i < IntLen; i++) {
                        var n = IntegerNum.substr(i, 1);
                        var p = IntLen - i - 1;
                        var q = p / 4;
                        var m = p % 4;
                        if (n == "0") {
                            zeroCount++;
                        } else {
                            if (zeroCount > 0) {
                                ChineseStr += cnNums[0];
                            }
                            zeroCount = 0; //归零
                            ChineseStr += cnNums[parseInt(n)] + cnIntRadice[m];
                        }
                        if (m == 0 && zeroCount < 4) {
                            ChineseStr += cnIntUnits[q];
                        }
                    }
                    ChineseStr += cnIntLast;
                    //整型部分处理完毕
                }
                if (DecimalNum != '') { //小数部分
                    var decLen = DecimalNum.length;
                    for (var i = 0; i < decLen; i++) {
                        var n = DecimalNum.substr(i, 1);
                        if (n != '0') {
                            ChineseStr += cnNums[Number(n)] + cnDecUnits[i];
                        }
                    }
                }
                if (ChineseStr == '') {
                    ChineseStr += cnNums[0] + cnIntLast + cnInteger;
                } else if (DecimalNum == '') {
                    ChineseStr += cnInteger;
                }
                return ChineseStr;
            }
        }
    })

    @yield('script_vue')

</script>
</html>