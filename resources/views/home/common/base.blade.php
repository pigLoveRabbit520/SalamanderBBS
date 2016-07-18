<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width,maximum-scale=1.0, minimum-scale=1.0,user-scalable=no" />
    <title>
        @yield('page_title', $settings['site_name'] .' - '. $settings['short_intro'])
    </title>
    <meta name="keywords" content="{{ $settings['site_keywords'] }}" />
    <meta name="description" content="{{ $settings['short_intro'] }}" />
    <meta content='True' name='HandheldFriendly'>
    @include('home.common.header-meta')
    @section('head')
    @show
</head>
<body>
    @include('home.common.header')

    @section('main')
    @show

    @include('home.common.footer')

    @section('script')
    @show
</body>
</html>