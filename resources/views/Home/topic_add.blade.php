@extends('home.common.base')

@section('head')
    <script src="/js/plugins.js" type="text/javascript"></script>
    <script src="/js/jquery.upload.js" type="text/javascript"></script>
    @if( Config::get('website.storage_set') =='local')
		<script src="/js/local.file.js" type="text/javascript"></script>
    @else
		<script src="/js/qiniu.js" type="text/javascript"></script>
   @endif
@stop

@section('main')
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">创建新主题</h3>
					</div>
					<div class="panel-body">
						<form accept-charset="UTF-8" action="/topic/chechAddTopic" id="new_topic" method="post"  name="add_new">
							<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
							<input name="node_id" type="hidden" value="1" />
							<div class="form-group">
								<label for="title">标题</label>
								<input class="form-control" id="topic_title" name="title" type="text" value="" />
								<span class="help-block red"></span>
							</div>
							<div class="form-group">
								<label for="node_id">节点</label>
								<select name="node_id" id="node_id" class="form-control">
                                    <option selected="selected" value="">请选择分类</option>
                                    @if($category[0])
                                    @foreach($category[0] as $v)

                                    @endforeach
                                    @endif
								</select>
								<span class="help-block red"></span>
							</div>
							<div class="form-group">
                                <textarea class="form-control" id="post_content" name="content" placeholder="话题内容" rows="10"></textarea>
								<span class="help-block red"></span>
								<p>
									<span text-muted>可直接粘贴链接和图片地址/发代码用&lt;pre&gt;标签</span>
								<span class="pull-right">
								<?php if(Config::get('qiniu.storage_set')=='local'){?>
									<input id="upload_file" type="button" value="图片/附件" name="file" class="btn btn-default pull-right">
									<?php } else {?>
									<input id="upload_file" type="button" value="图片/附件"  class="btn btn-default">
									<?php }?></span>
								</p>
							</div>
							@if(Config::get('qiniu.auto_tag') =='off')
							<div class="form-group">
								<label for="keywords">标签：</label>
								<input type="text" name="keywords" class="form-control" id="keywords">
								<span class="help-block">标签间用逗号(,)隔开</span>
							</div>
							@endif

							<button type="submit" class="btn btn-primary">创建</button><small class="text-muted">(支持 Ctrl + Enter 快捷键)</small>

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