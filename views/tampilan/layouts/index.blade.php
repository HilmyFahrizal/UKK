<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">

    <title>HFcamp</title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href={{ asset('assets/front/css/bootstrap.min.css') }}>
    <link rel="stylesheet" type="text/css" href={{ asset('assets/front/css/font-awesome.css') }}>
    <link rel="stylesheet" href={{ asset('assets/css/index.css') }}>
    <link rel="stylesheet" href={{ asset('assets/front/css/templatemo-hexashop.css') }}>
    <link rel="stylesheet" href={{ asset('assets/front/css/owl-carousel.css') }}>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href={{ asset('assets/front/css/lightbox.css') }}>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">


    <!--

TemplateMo 571 Hexashop

https://templatemo.com/tm-571-hexashop

-->
</head>

<body>

    <!-- ***** Preloader Start ***** -->
    {{-- <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div> --}}
    <!-- ***** Preloader End ***** -->

    @include('tampilan.partials.navbar')
    <div>
        @yield('container')
    </div>
    @include('tampilan.partials.footer')
    <!-- jQuery -->
    <script src={{ asset('assets/front/js/jquery-2.1.0.min.js') }}></script>
    <!-- Bootstrap -->
    <script src={{ asset('assets/front/js/popper.js') }}></script>
    {{-- <script src={{ asset('assets/front/js/bootstrap.min.js') }}></script> --}}
    <!-- Plugins -->
    <script src={{ asset('assets/front/js/owl-carousel.js') }}></script>
    <script src={{ asset('assets/front/js/accordions.js') }}></script>
    <script src={{ asset('assets/front/js/datepicker.js') }}></script>
    <script src={{ asset('assets/front/js/scrollreveal.min.js') }}></script>
    <script src={{ asset('assets/front/js/waypoints.min.js') }}></script>
    <script src={{ asset('assets/front/js/jquery.counterup.min.js') }}></script>
    <script src={{ asset('assets/front/js/imgfix.min.js') }}></script>
    <script src={{ asset('assets/front/js/jquery-2.1.0.min.js') }}></script>
    <script src={{ asset('assets/front/js/jquery-2.1.0.min.js') }}></script>
    <script src={{ asset('assets/front/js/popper.js') }}></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src={{ asset('assets/front/js/owl-carousel.js') }}></script>
    <script src={{ asset('assets/front/js/accordions.js') }}></script>
    <!-- Global Init -->
    <script src={{ asset('assets/front/js/datepicker.js') }}></script>
    <script src={{ asset('assets/front/js/scrollreveal.min.js') }}></script>
    @yield('script')

    <script src={{ asset('assets/front/js/waypoints.min.js') }}></script>

</body>

</html>
