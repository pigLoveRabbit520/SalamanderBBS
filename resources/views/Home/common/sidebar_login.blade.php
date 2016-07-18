@if(session('uid'))
<div class="panel">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-5">
                <a href="/user/profile/{{ $myinfo['uid'] }}>">
                    <img alt="{{ $myinfo['username'] }} large avatar" class="img-rounded" src="{{ $myinfo['avatar'] }}" />
                </a>
            </div>
            <div class="col-md-7">
	            <ul class="list-unstyled">
	            	<li>
                        <a href="/user/profile/{{ $myinfo['uid'] }}" title="{{ $myinfo['username'] }}">
                            {{ $myinfo['username'] }}
                        </a>
                    </li>
	            	<li>用户组：{{ $myinfo['group_name'] }}</li>
	            	<li>积分：{{ $myinfo['credit'] }}</li>
	            </ul>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-6">
	            <p>
                    <a href="/favorites">{{ $myinfo['favorites'] }}</a>
                </p>
	            <p>
                    <a href="/favorites">收藏</a>
                </p>
            </div>
            <div class="col-md-6">
	            <p><a href="/follow">{{ $myinfo['follows'] }}</a></p>
	            <p><a href="/follow">关注</a></p>
            </div>
        </div>
    </div>
    <div class="panel-footer text-muted">
		@if(!empty($myinfo['notices']))
		<img align="top" alt="Dot_orange" class="icon" src="/common/images/dot_orange.png" />
		<a href="/notifications">{{ $myinfo['notices'] }} 条未读提醒</a>
		@else
		暂无提醒
		@endif
	</div>
</div>
@else
<div class="panel panel-default">
    <div class="panel-heading">
        <h4>{{ $settings['site_name'] }}</h4>
    </div>
    <div class="panel-body">
        <a href="/user/register" class="btn btn-default">现在注册</a> 已注册请
        <a href="/user/login" class="startbbs">登入</a>
    </div>
</div>
@endif