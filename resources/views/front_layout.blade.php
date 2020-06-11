<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Grab-It</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    @includeIf('front.partials.styles')
    @yield('styles')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

{{-- top navbar area start --}}
{{--@includeif('admin.partials.top-navbar')--}}
{{-- top navbar area end --}}


{{-- side navbar area start --}}
{{--@includeif('admin.partials.side-navbar')--}}
{{-- side navbar area end --}}

@yield('content')

@includeIf('front.partials.footer')

@includeIf('front.partials.scripts')
@yield('styles')
</div>
</body>
</html>
