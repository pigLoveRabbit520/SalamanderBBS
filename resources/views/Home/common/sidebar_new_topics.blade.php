<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">最新贴子</h3>
    </div>
    <div class="panel-body">
    <ul class="list-unstyled">
        @if(isset($new_topics))
            @foreach($new_topics as $v)
                <li>
            <span>
                <a href="<?php echo url('topic_show',$v['topic_id']);?>" class="startbbs">
                    {{ substr($v['title'],14) }}</a>
                <span class="pull-right gray">{{ $v['updatetime'] }}</span></span>
                </li>
            @endforeach
        @endif
    </ul>
    </div>
</div>
