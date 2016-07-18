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
                        <h3 class="panel-title">
                            {{ $settings['site_name'] }}<span class='pull-right'>话题总数<span class='badge badge-info'>&nbsp;{{ $stats['total_topics'] }}&nbsp;</span></span></h3>
                    </div>
                    <div class="panel-body">
                        {{ $settings['site_description'] }}
                    </div>
                </div>
                <?php if($catelist[0]):?>
                <?php if(count($catelist)==1):?>
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">所有结点</h3>
                    </div>
                    <div class="panel-body">
                        <ul class="media-list">
                            @foreach($catelist[0] as $k=>$v)
                            <li class="media section">
                                <a class="media-left" href="#">
                                    <img class="img-rounded" src="{{ $v['ico'] }}" alt="{{ $v['cname'] }}" />
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading"><a href="/node/show/{{ $v['node_id'] }}">{{ $v['cname'] }}</a></h4>
                                    <p class="text-muted">
                                        {{ $v['content'] }}
                                    </p>
                                    <p class="text-muted">
                                        版主:{{ $v['master'] }}
                                    </p>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <?php endif?>
                <?php if(count($catelist)>1):?>
                @foreach($catelist[0] as $v)
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{ $v['cname'] }}</h3>
                    </div>
                    <div class="panel-body">
                        @if(isset($catelist[$v['node_id']]))
                        <ul class="media-list">
                            @foreach($catelist[$v['node_id']] as $k=>$c)
                            <li class="media section">
                                <a class="pull-left" href="<?php echo url('node_show',$v['node_id']);?>">
                                    <img class="img-rounded" src="{{ $c['ico'] }}" alt="<?php echo $c['cname'];?>">
                                </a>
                                <span class="pull-right text-right">
                                    <p>/今日</p>
                                    <p>{{ $c['listnum'] }}/话题</p>
                                </span>
                                <div class="media-body">
                                    <h4 class="media-heading"><a href="/node/show/{{ $c['node_id'] }}">{{ $c['cname'] }}</a>
                                    </h4>
                                    </h4>
                                    <p class="text-muted">
                                        {{ $c['content'] }}
                                    </p>
                                    <p class="text-muted">
                                        版主:{{ $c['master'] }}
                                    </p>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        @else
                        暂无节点
                        @endif
                    </div>
                </div>
                @endforeach
                <?php endif?>
                <?php else:?>
                <div class="panel panel-default">
                    <div class="panel-body">
                        暂无节点，请到后台添加
                    </div>
                </div>
                <?php endif?>
            </div><!-- /.col-md-8 -->

            <div class="col-md-4">
                @include('home.common.sidebar_login')
                @include('home.common.sidebar_new_users')
                @include('home.common.sidebar_new_topics')
                @include('home.common.sidebar_ad')
            </div><!-- /.col-md-4 -->

        </div><!-- /.row -->
    </div><!-- /.container -->
@stop