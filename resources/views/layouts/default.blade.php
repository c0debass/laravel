<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', "E-Com")</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/css/app.css')
    @yield('styles')
</head>

<body class="h-full">
    @include("includes.header")
    @yield('content')
    @guest
        @include('includes.signup')
    @endguest
    @include("includes.footer")
    <script src="{{asset("assets/js/bootstrap.min.js")}}"></script>
    @yield('scripts')
</body>
</html>
