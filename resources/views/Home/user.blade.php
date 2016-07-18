@extends('home.common.base')

@section('main')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">最新会员</h3>
                    </div>
                    <div class="panel-body">
                        <ul class='user-list clearfix'>
                            <?php if($new_users) foreach($new_users as $v){?>
                            <li>
                                <a href="/user/profile/{{ $v['uid'] }}" title="{{ $v['username'] }}">
                                    <img class="img-rounded" alt="<?php echo $v['username'];?>" src="{{ $v['avatar'] }}.normal.png" />
                                </a></li>
                            <?php }?>
                        </ul>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">活跃会员</h3>
                    </div>
                    <div class="panel-body">
                        <ul class='user-list clearfix'>
                            <?php if($hot_users) foreach($hot_users as $v){?>
                            <li>
                                <a href="user/profile/{{ $v['uid'] }}"  title="{{ $v['username'] }}">
                                    <img class="img-rounded" alt="<?php echo $v['username'];?>" src="{{ $v['avatar'] }}normal.png" />
                                </a></li>
                            <?php }?>
                        </ul>
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