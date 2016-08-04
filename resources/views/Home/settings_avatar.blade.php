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
                            <li><a href="/settings/profile">基本信息</a></li>
                            <li class="active"><a href="javascript:void(0)">修改头像</a></li>
                            <li><a href="/settings/password">密码安全</a></li>
                        </ul>
                        <div class="setting">
                            <?php if ($msg!='') echo '<div class="alert alert-danger">'.$msg.'</div>'; ?>
                            <form class="form-horizontal" enctype="multipart/form-data" action="/settings/avatar_upload" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">当前头像</label>
                                        <div class="col-md-8">
                                            @if (!empty($myinfo['avatar']))
                                                <img class="large_avatar" src="{{ $myinfo['avatar']. 'big.png' }}" class="img-rounded">
                                                <img class="middle_avatar" src="{{ $myinfo['avatar'].'normal.png' }}" class="img-rounded">
                                                <img class="small_avatar" src="{{ $myinfo['avatar'].'small.png' }}" class="img-rounded">
                                            @else
                                                <img class="large_avatar" src="/uploads/avatar/avatar_large.jpg"/>
                                                <img class="middle_avatar" src="/uploads/avatar/default.jpg"/>
                                                <img class="small_avatar" src="/uploads/avatar/avatar_small.jpg"/>
                                            @endif
                                            <div class="alert alert-info alert-avatar">
                                                <strong>注意</strong> 支持 512k 以内的 PNG / GIF / JPG 图片文件作为头像，推荐使用正方形的图片以获得最佳效果。
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="avatar_file">选择图片</label>
                                        <div class="col-md-6">
                                            <input type="file" id="avatar_file" name="avatar_file" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-6">
                                            <button type="submit" name="upload" class="btn btn-primary">上传新头像</button>
                                        </div>
                                    </div>
                                </fieldset>
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
