@extends('home.common.base')

@section('main')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{ $settings['welcome_tip'] }}</h3>
                    </div>
                    <div class="panel-body">
                        @if(!empty($topic_list))
                            <ul class="media-list" id="topic_list">
                                @foreach ($topic_list as $v)
                                <li class="media topic-list">
                                    <div class="pull-right">
                                        <span class="badge badge-info topic-comment">
                                            <a href="/topic/show/{{ $v['topic_id'] }}#reply">
                                                {{ $v['comments'] }}
                                            </a>
                                        </span>
                                    </div>
                                    <a class="media-left" href="/user/profile/{{ $v['uid'] }}">
                                        <img class="img-rounded medium" src="" alt="{{ $v['nickname'] }} medium avatar">
                                    </a>
                                    <div class="media-body">
                                        <h2 class="media-heading topic-list-heading">
                                            <a href="/topic/show/{{ $v['topic_id'] }}">{{ $v['title'] }}</a>@if($v['is_top'] == '1')<span class="badge badge-info">置顶</span>@endif
                                        </h2>
                                        <p class="text-muted">
                                            <span>
                                                <a href="/node/show/{{ $v['node_id'] }}">{{ $v['cname'] }}</a>
                                            </span>&nbsp;•&nbsp;
                                            <span>
                                                <a href="/user/profile/{{ $v['uid'] }}">{{ $v['nickname'] }}</a>
                                            </span>&nbsp;•&nbsp;
                                            <span>{{ $v['updatetime'] }}</span>&nbsp;•&nbsp;
                                            @if(!empty($v['rname']))
                                            <span>最后回复来自 <a href="user/profile/{{ $v['ruid'] }}">{{ $v['rname'] }}</a></span>
                                            @else
                                            <span>暂无回复</span>
                                            @endif
                                        </p>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        @else
                            暂无话题
                        @endif
                    </div>
                    <div class="panel-footer">
                        <a href="javascript:void(0)" id="getmore" class="startbbs">更多新主题</a>
                    </div>
                </div><!-- /.topic list -->

            </div><!-- /.col-md-8 -->

            <div class="col-md-4">
                @include('home.common.sidebar_login')
                @include('home.common.sidebar_cates')

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">社区统计</h3>
                    </div>
                    <div class="panel-body">
                        <ul class="list-unstyled">
                            <li>最新会员：{{ $stats['last_username'] }}</li>
                            <li>注册会员：{{ $stats['total_users'] }}</li>
                            <li>今日话题：{{ $stats['today_topics'] }}</li>
                            <li>昨日话题：{{ $stats['yesterday_topics'] }}</li>
                            <li>话题总数：{{ $stats['total_topics'] }}</li>
                            <li>回复数：{{ $stats['total_comments'] }}</li>
                        </ul>
                    </div>
                </div>

                @include('home.common.sidebar_ad')
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">友情链接</h3>
                    </div>
                    <div class="panel-body">
                        <ul class="list-unstyled">
                            <li style="width:0; height:0; overflow:hidden;">
                                <a href="http://www.startbbs.com" target="_blank">StartBBS</a>
                            </li>
                            @if(!empty($links))
                                @foreach($links as $v)
                                    @if($v['is_hidden']==0)
                                        <li>
                                            <a href="{{ $v['url'] }}" target="_blank">{{ $v['name'] }}</a>
                                        </li>
                                    @else
                                        <li>暂无链接</li>
                                    @endif
                                @endforeach
                            @else
                                <li>暂无链接</li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div><!-- /.col-md-4 -->

        </div><!-- /.row -->
    </div><!-- /.container -->
@stop