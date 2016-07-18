<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">最新会员</h3>
    </div>
    <div class="panel-body">
		<ul class='user-list clearfix'>
			@if(!empty($new_users))
                @foreach($new_users as $v)
                <li>
                    <a href="/user/profile/{{ $v['uid'] }}"  title="{{ $v['username'] }}">
                        <img class="img-rounded" alt="{{ $v['username'] }}" src="{{ $v['avatar'].'normal.png' }}" />
                    </a>
                </li>
                @endforeach
			@endif
		</ul>
    </div>
</div>