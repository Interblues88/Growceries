<!doctype html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title') </title>

    {{-- Navbar CSS--}}
    <link rel="stylesheet" href="{{ asset('css/admin/layout/adminNav.css') }}">

    {{-- link tailwind css --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />

    {{-- Link Awesome Font --}}
    <script src="https://kit.fontawesome.com/54958872eb.js" crossorigin="anonymous"></script>

    {{-- Link Font Itim --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">

    @stack('head') {{-- untuk nge push head nanti bisa di css in kayak di home.blade.php --}}

</head>
<body>
    @if (Route::currentRouteName() == 'admin.products')
        @include('navigation.admin.nav'	)
    @else
        @include('navigation.admin.defaultNav')
    @endif
    
    @include('widgets.errorMessage')
    @include('widgets.successMessage')

    @if (Route::currentRouteName() == 'admin.login')
        @yield('login')
    @else
        @yield('content')
    @endif

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script src="{{ asset('js/nav.js') }}"></script>

    @yield('script')

</body>
</html>
