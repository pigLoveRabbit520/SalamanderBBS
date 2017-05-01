<div id="navbar-wrapper">
<div  id="navigation" class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">{!! $settings['logo'] !!}</a>
        </div>

        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li @if(Request::path() == '/') class="active" @endif><a href="/">首页</a></li>
                <li @if(Request::path() == 'nodes') class="active" @endif><a href="/nodes">节点</a></li>
                <li @if(Request::path() == 'users') class="active" @endif><a href="/users">会员</a></li>
                <li @if(Request::path() == 'tags') class="active" @endif><a href="/tags">标签</a></li>
                <li @if(Request::path() == 'topic/add') class="active" @endif><a href="/topic/add">发表</a></li>
            </ul>

            <form action="/search" method="post" accept-charset="utf-8" class="navbar-form navbar-left" target="_blank" role="search">
                <div style="display:none">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="keyword" placeholder="输入关键字回车">
                </div>
            </form>

            <ul class="nav navbar-nav navbar-right">
                @if(session('uid'))
                    <li>
                        <a href="/message">
                            <span class="glyphicon glyphicon-envelope"></span>
                            @if($myinfo['messages_unread']>0) {{ $myinfo['messages_unread'] }} @endif
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class='glyphicon glyphicon-user'></span> {{ $myinfo['nickname'] }} <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="/user/{{ session('uid') }}">个人主页</a></li>
                            <li><a href="/message">站内信</a></li>
                            <li><a href="/settings">设置</a></li>
                            @if(session('uid'))
                            <li><a href="/admin/login">管理后台</a></li>
                            @endif
                            <li class="divider"></li>
                            <!--<li class="dropdown-header">Nav header</li>-->
                            <li><a href="/user/logout">退出</a></li>
                        </ul>
                    </li>
                @else
                    <li><a href="/user/register">注册</a></li>
                    <li><a href="/user/login">登入</a></li>
                @endif
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>

</div>