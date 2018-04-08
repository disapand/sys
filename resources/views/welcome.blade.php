<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>借贷管理系统</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <style>
            .login-page, body, html {
                width: 100%;
                height: 100%;
            }

            .login-page {
                background-image: url('https://file.iviewui.com/iview-admin/login_bg.jpg');
            }

            .pos {
                margin-top: 50%;
            }

        </style>

    </head>
    <body>
        <div class="login-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-8"></div>
                    <div class="col-3">
                        <div class="card bg-Secondary text-dark pos">
                            <div class="card-header">
                                登录
                            </div>
                            <div class="card-body">

                                {{--  --}}
                                <form action="{{ route('login') }}" method="Post">
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <label for="Num">工号：</label>
                                        <input type="text" name="Num" class="form-control" placeholder="请输入工号" value="{{ old('Num') }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="password">密码：</label>
                                        <input type="password" name="password" class="form-control" placeholder="请输入密码" value="{{ old('password') }}">
                                    </div>

                                    @include('shared._errors')
                                    @include('shared._message')

                                    <button type="submit" class="btn btn-block btn-primary">登录</button>

                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-1"></div>
                </div>
            </div>
        </div>
    </body>
</html>
