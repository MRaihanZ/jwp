<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @include('partials.styles')
</head>

<body>
    @if (Route::is(['home', 'detail', 'order', 'login']))
        @include('partials.navbar')
    @else
        @include('partials.adminNavbar')
    @endif
    <main id="main" class="container mx-auto mt-5">
        @yield('content')
    </main>

    @include('partials.footers')
    @include('partials.scripts')
</body>

</html>
