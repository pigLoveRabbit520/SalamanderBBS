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
                        <h3 class="panel-title">最新标签</h3>
                    </div>
                    <div class="panel-body">
                        <ul class="list-unstyled">
                            @if(!empty($tags))
                                @foreach($tags as $v)
                                    <span class="label label-grey"><a href="/tag/show/{{ $v['tag_title'] }}">{{ $v['tag_title'] }}</a></span><span class="text-muted">X{{ $v['topics'] }}</span>
                                @endforeach
                            @endif
                        </ul>
                        {!! $tags->render() !!}
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