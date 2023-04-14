<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('./css/boostrap.css') }}">

    <link rel="stylesheet" href="{{ asset('./css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('./css/owl.default.css') }}">
    <link rel="stylesheet" href="{{ asset('./css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('./css/awesome.css') }}">

    <link rel="shortcut icon" type="image/x-icon" href="https://htmldemo.net/angara/angara/img/favicon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="{{ asset('frontend/js/jquery.js') }}"></script>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Poppins&family=Roboto&display=swap"
        rel="stylesheet">
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="{{ asset('./css/app.css') }}">


    {{-- <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script> --}}

    @yield('css')
</head>

<body>
    <div class="main">
        <div class="content">
            @include('layouts.inc.frontNavBar')
            @yield('content')
            @include('layouts.inc.frontFooter')

        </div>

    </div>

    <script src="{{ asset('./js/boostrap.js') }}"></script>
    <script src="{{ asset('./js/jquery.js') }}"></script>
    <script src="{{ asset('./js/sweet.js') }}"></script>
    {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
    <script src="{{ asset('./js/sweet2.js') }}"></script>
    <script src="{{ asset('./js/owl.js') }}"></script>
    <script src="{{ asset('./js/app.js') }}"></script>

    @if (session('status'))
        <script>
            Swal.fire("Xong!", "{{ session('status') }}", "success");
        </script>
    @endif
    @yield('scripts')

</body>

</html>
