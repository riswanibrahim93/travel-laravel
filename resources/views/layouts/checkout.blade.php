<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ url('/frontend/assets/img/icon.png') }}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{ url('/frontend/assets/img/icon.png') }}">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>@yield('title')</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />


    @stack('addon-style')
    @include('includes.style')

</head>

<body>

    @include('includes.navbar_checkout')


    @yield('content')


    @include('includes.footer')

</body>

    @include('includes.script')
    @stack('addon-script')

</html>
