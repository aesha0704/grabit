<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    @includeif('admin.partials.styles')
    @yield('styles')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

{{-- top navbar area start --}}
@includeif('admin.partials.top-navbar')
{{-- top navbar area end --}}


{{-- side navbar area start --}}
@includeif('admin.partials.side-navbar')
{{-- side navbar area end --}}

@yield('content')

@includeif('admin.partials.footer')

@includeif('admin.partials.scripts')
@yield('styles')
</body>
</html>
