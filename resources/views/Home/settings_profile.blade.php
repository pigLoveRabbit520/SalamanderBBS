@extends('home.common.base')

@section('page_title')
    {{ $title . '- ' . $settings['site_name'] }}
@stop

@section('main')
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="panel">
					<div class="panel-heading">
						<h4>账号设置</h4>
					</div>
					<div class="panel-body">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#">基本信息</a></li>
							<li><a href="/settings/avatar">修改头像</a></li>
							<li><a href="/settings/password">密码安全</a></li>
						</ul>
						<div class="setting">
							<form accept-charset="UTF-8" action="/settings/profile" class="form-horizontal" method="post">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class="form-group">
									<label class="col-md-2 control-label" for="user_nickname">昵称</label>
									<div class="col-md-6">
										<input class="form-control" disabled="disabled" id="user_nickname" name="nickname" type="text" value="{{ $nickname }}" />
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-2 control-label" for="user_email">电子邮件</label>
									<div class="col-md-6">
										<input class="form-control" id="user_email" name="email" size="50" type="email" value="{{ $email }}" />
										<span class="help-block red"></span>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-2 control-label" for="user_account_attributes_personal_website">个人网站</label>
									<div class="col-md-6">
										<input class="form-control" id="user_account_attributes_personal_website" name="homepage" size="50" type="text" value="<?php echo $homepage?>" />
										<span class="help-block red"></span>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-2 control-label" for="user_account_attributes_location">所在地</label>
									<div class="col-md-6">
										<input class="form-control" id="user_account_attributes_location" name="location" size="50" type="text" value="<?php echo $location?>" />
										<span class="help-block red"></span>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-2 control-label" for="user_account_attributes_signature">QQ</label>
									<div class="col-md-6">
										<input class="form-control" id="user_account_attributes_signature" name="qq" size="50" type="text" value="<?php echo $qq?>" />
										<span class="help-block red"></span>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-2 control-label" for="user_account_attributes_signature">签名</label>
									<div class="col-md-6">
										<input class="form-control" id="user_account_attributes_signature" name="signature" size="50" type="text" value="<?php echo $signature?>" />
										<span class="help-block red"></span>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-2 control-label" for="user_account_attributes_introduction">个人简介</label>
									<div class="col-md-6">
										<textarea class="form-control" cols="40" id="user_account_attributes_introduction" name="introduction" rows="5"><?php echo $introduction?></textarea>
										<span class="help-block red"></span>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-offset-2 col-md-6">
										<button type="submit" class="btn btn-primary">保存</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
                @include('home.common.sidebar_login')
                @include('home.common.sidebar_ad')
			</div>
		</div>
	</div>
@stop