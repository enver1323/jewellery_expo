<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Material Design Bootstrap Template</title>

    <link rel="stylesheet" href="{{'/css/app.css'}}">
    <link rel="stylesheet" href="{{'/css/auth.css'}}">
</head>

<body class="login-page">

<!-- Main Navigation -->
<header>

    <!-- Navbar -->
    @include('layouts.partials.frontend.navFront')
    <!-- Navbar -->

    <section class="view intro-2 rgba-stylish-strong ">
        <div class="h-100 d-flex justify-content-center align-items-center">
            <!-- Intro Section -->
            @yield('content')
            <!-- Intro Section -->
        </div>
    </section>

</header>
<!-- Main Navigation -->

<!-- Scripts -->
<script src="{{mix('/js/app.js')}}"></script>

@stack('scripts')

<!-- Scripts -->
</body>

</html>
