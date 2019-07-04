<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>{{ env('APP_NAME') }} | @yield('title')</title>
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('css/theme/' . env('BOOTSTRAP_THEME') . '/bootstrap.min.css') }}">
    <!-- icons -->
    <link rel="shortcut icon" href="{{ asset('/img/fav.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('/img/fav.ico') }}" type="image/x-icon">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    @yield('style')
    @yield('header_script')
</head>
<body>
    @include('layouts._navbar')
    <div class="container">
        @yield('container')
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('end_script')
    @if(app()->isLocal() && Auth::check())
        @include('sudosu::user-selector')
    @endif
</body>
</html>
