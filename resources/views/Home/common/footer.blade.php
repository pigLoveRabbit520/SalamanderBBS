<footer class="small">
	<div class="container">
		<div class="row">
			@if(!empty($page_links))
			<ul class="list-inline">
				@foreach($page_links as $key=>$v)
					@if($v['go_url'])
						<li>
							<a href="{{ $v['go_url'] }}" target=_blank>{{ $v['title'] }}</a>
						</li>
					@else
						<li>
							<a href="/page/index/{{ $v['pid'] }}">{{ $v['title'] }}</a>
						</li>
					@endif
				@endforeach
			</ul>
			@endif
			<p>{{ $settings['site_name'] }}  {{ $settings['site_stats'] }}</p>
			<p>Powered by <a href="{{ Config::get('sys_url') }}" class="text-muted" target="_blank">{{ Config::get('sys_name') }}</a>
			{{ Config::get('sys_version') }} 2013-2014 Some rights reserved 页面执行时间:  0s</p>
		</div>
	</div>
</footer>
<script src="/js/bootstrap.min.js"></script>