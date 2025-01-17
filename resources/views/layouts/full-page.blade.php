<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      data-textdirection="{{ $configData['direction'] === 'rtl' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>@if(! empty($header)){{ $header }} | @endif {{ Dcat\Admin\Admin::title() }}</title>

    @if(! config('admin.disable_no_referrer_meta'))
        <meta name="referrer" content="no-referrer"/>
    @endif

    @if(! empty($favicon = Dcat\Admin\Admin::favicon()))
        <link rel="shortcut icon" href="{{$favicon}}">
    @endif

    {!! admin_section(\AdminSection::HEAD) !!}

    {!! Dcat\Admin\Admin::asset()->cssToHtml() !!}

    {!! Dcat\Admin\Admin::asset()->headerJsToHtml() !!}

    @yield('head')
</head>

<body
      class="dcat-admin-body vertical-layout vertical-menu-modern 1-column {{ $configData['blank_page_class'] }} {{ $configData['body_class'] }} {{($configData['theme'] === 'light') ? '' : $configData['theme'] }}"
        data-menu="vertical-menu-modern" data-col="1-column" data-layout="{{ $configData['theme'] }}">

<script>
    var Dcat = CreateDcat({!! Dcat\Admin\Admin::jsVariables() !!});
</script>

{{-- 页面埋点 --}}
{!! admin_section(\AdminSection::BODY_INNER_BEFORE) !!}

<div class="app-content content">
    <div class="content-wrapper" id="{{ $pjaxContainerId }}">
        @yield('app')
    </div>
</div>

{!! admin_section(\AdminSection::BODY_INNER_AFTER) !!}

{!! Dcat\Admin\Admin::asset()->jsToHtml() !!}

<script>Dcat.boot();</script>

</body>
</html>