<!doctype html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    @include('website.layout.styles')
    @yield('styles')
</head>
<body>
    @include('website.layout.navbar')

    @yield('content')

    @include('website.layout.footer')

    @include('website.layout.preloader')

    @include('website.layout.scripts')
    @yield('scripts')
</body>

</html>
