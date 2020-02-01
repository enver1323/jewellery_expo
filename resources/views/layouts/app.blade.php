<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Material Design Bootstrap</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{mix('css/app.css')}}">
    <link rel="stylesheet" href="{{mix('css/frontend.css')}}">

</head>

<body class="event-lp">

<!-- Navigation & Intro -->
<header>

    <!-- Navbar -->
    @include('layouts.partials.nav')
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
@include('layouts.partials.footer')

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
