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
						<h3 class="panel-title">请登录</h3>
					</div>
					<div class="panel-body">
						<form accept-charset="UTF-8" action="/user/verify" class="form-horizontal" id="new_user" method="post">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="form-group">
								<label class="col-md-2 control-label" for="user_nickname">邮箱</label>
								<div class="col-md-6">
									<input class="form-control" name="email" size="50" type="text" value=""/>
                                    <span class="help-block red">{{ $errors->first('email') }}</span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label" for="user_password">密码</label>
								<div class="col-md-6">
									<input class="form-control" id="user_password" name="password" size="50" type="password" value=""/>
									<span class="help-block red">{{ $errors->first('passowrd') }}</span>
								</div>
							</div>
							@if(Config::get('website.show_captcha') == 'on')
							<div class="form-group">
								<label class="col-md-2 control-label" for="captcha_code">验证码</label>
								<div class="col-md-4">
									<input class="form-control" id="captcha_code" name="captcha" size="50" type="text"  value=""/>
									<span class="help-block red">{{ $errors->first('captcha') }}</span>
								</div>
								<div class="col-md-3">
									<a href="javascript:reloadcode();" title="更换验证码"><img src="/getCaptcha" name="checkCodeImg" id="checkCodeImg" border="0" /></a>&nbsp;
                                    <a href="javascript:reloadcode();">换一张</a>
								</div>
							</div>
							<script language="javascript">
								// 刷新图片
								function reloadcode() {
									var verify = document.getElementById('checkCodeImg');
									verify.setAttribute('src', '/getCaptcha?r=' + Math.random());
								}
							</script>
							@endif
							<div class='form-group'>
								<div class="col-md-offset-2 col-md-9">
									<button type="submit" name="commit" class="btn btn-primary">登入</button>
									<a href="/user/findpwd" class="btn btn-default" role="button">找回密码</a>
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