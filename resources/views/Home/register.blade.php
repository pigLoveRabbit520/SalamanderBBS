@extends('home.common.base')

@section('page_title')
    {{ $title . '- ' . $settings['site_name'] }}
@stop

@section('main')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">注册用户</h3>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" id="new_user" method="post" >
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="user_nickname">昵称</label>
                                <div class="col-sm-5">
                                    <input class="form-control" id="user_nickname" name="nickname" type="text" value="" />
                                    <span class="help-block red">{{ $errors->first('nickname') }}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="user_email">邮箱</label>
                                <div class="col-sm-5">
                                    <input class="form-control" id="user_email" name="email" size="50" type="email" value="" />
                                    <span class="help-block red">{{ $errors->first('email') }}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="user_password">密码</label>
                                <div class="col-sm-5">
                                    <input class="form-control" id="user_password" name="password" type="password" value="" />
                                    <span class="help-block red">{{ $errors->first('password') }}</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="user_password_confirmation">密码确认</label>
                                <div class="col-sm-5">
                                    <input class="form-control" id="user_password_confirmation" name="password_confirm" type="password" value="" />
                                    <span class="help-block red">{{ $errors->first('password_confirm') }}</span>
                                </div>
                            </div>
                            @if(Config::get('website.show_captcha'))
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="captcha_code">验证码</label>
                                    <div class="col-sm-3">
                                        <input class="form-control" id="captcha_code" name="captcha_code" size="4" type="text" value="" />
                                        <span class="help-block red">{{ $errors->first('captcha_code') }}</span>
                                    </div>
                                    <div class="col-sm-4">
                                        <a href="javascript:reloadcode();" title="更换验证码"><img src="/getCaptcha" name="checkCodeImg" id="checkCodeImg" border="0" /></a> <a href="javascript:reloadcode();">换一张</a>
                                    </div>
                                </div>
                                <script language="javascript">
                                    // 刷新图片
                                    function reloadcode() {//刷新验证码函数
                                        var verify = document.getElementById('checkCodeImg');
                                        verify.setAttribute('src', 'ff' + Math.random());
                                    }
                                </script>
                            @endif
                            <div class='form-group'>
                                <div class="col-sm-offset-2 col-sm-9">
                                    <button type="submit" name="commit" class="btn btn-primary">注册</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.col-md-8 -->

            <div class="col-md-4">
                @include('home.common.sidebar_login')
                @include('home.common.sidebar_ad')
            </div><!-- /.col-md-4 -->

        </div><!-- /.row -->
    </div><!-- /.container -->
@stop