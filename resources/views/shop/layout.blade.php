<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    @includeif('shop.partials.styles')
    @yield('styles')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

{{-- top navbar area start --}}
@includeif('shop.partials.top-navbar')
{{-- top navbar area end --}}


{{-- side navbar area start --}}
@includeif('shop.partials.side-navbar')
{{-- side navbar area end --}}

@yield('content')

@includeif('shop.partials.footer')

@includeif('shop.partials.scripts')
@yield('styles')
</body>
</html>
