<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    @isset($seo)
        @include('layouts.partials.frontend.seo', ['seo' => $seo])
    @endisset
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
    <link rel="stylesheet" href="{{mix('css/frontend.css')}}">
    @yield('head')
</head>

<body class="event-lp">

<!-- Navigation & Intro -->
<header class="mt-5">

    <!-- Navbar -->
@include('layouts.partials.frontend.navFront')
<!-- Navbar -->

    <!-- Header !-->
@yield('header')
<!-- Header !-->
</header>
<!-- Navigation & Intro -->

<!-- Main content -->
<main>
    @yield('content')
</main>
<!-- Main content -->

<!--Footer-->
@include('layouts.partials.frontend.footer')

<script type="text/javascript" src="{{mix('js/app.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>

<script>
    //Animation init
    new WOW().init();
    //Modal
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').focus()
    })
    // Material Select Initialization
    $(document).ready(function () {
        $('.mdb-select').material_select();
    });
    // MDB Lightbox Init
    $(function () {
        $("#mdb-lightbox-ui").load("../mdb-addons/mdb-lightbox-ui.html");
    });

</script>
@stack('scripts')
</body>

</html>
