<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
    <title>
        @if(!empty($heading))
            {{ $heading }}
        @else
            Error
        @endif
    </title>
    <meta name="viewport" content="width=device-width,maximum-scale=1.0, minimum-scale=1.0,user-scalable=no" />
    <link href="/css/bootstrap.min.css" media="screen" rel="stylesheet" type="text/css" />
    <style type="text/css">
        #container {
            width:600px;
            margin: 10px auto;
            padding: 20px;
            border: 1px solid #D0D0D0;
            -webkit-box-shadow: 0 0 8px #D0D0D0;
        }
    </style>
</head>
<body>
<div id="container">
    <h2>{{ $heading }}</h2>
    <div class="alert<?php if ($status==1){ ?> alert-success<?php }else{?> alert-danger<?php } ?>" role="alert">
        {{ $message }}
    </div>
    <p>
        @if(empty($url))
            <a href="javascript:history.back();" class="alert-link">
                如果您的浏览器没有自动跳转，请点击这里
            </a>
            <script language="javascript">
                setTimeout(function(){history.back();}, {{ $time }});
            </script>
        @else
        <a href="<?php echo $url?>" class="alert-link">如果您的浏览器没有自动跳转，请点击这里</a>
        <script language="javascript">setTimeout("location.href='{{ $url}}}';"<?php echo $time; ?>);</script>
        @endif
    </p>

</div>
</body>
</html>