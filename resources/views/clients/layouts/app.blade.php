<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ config('app.name') }} Networks</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('dist/img/sa-flag-icon.png') }}" rel="icon">
  <link href="{{ asset('dist/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('dist/vendor/aos/aos.css') }}" rel="stylesheet">
  <!-- <link href="{{ asset('dist/css/adminlte.css') }}" rel="stylesheet"> -->
  <link href="{{ asset('dist/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('dist/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('dist/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('dist/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('dist/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
  
  <!-- Template Main CSS File -->
  <link href="{{ asset('dist/css/style.css') }}" rel="stylesheet">

  @stack('styles')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  @include('clients.layouts.navigation')

  <main id="main" data-aos="fade-up">
     <section class="inner-page">
        <div class="container">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @yield('content')
        </div>
    </section>
  </main>
  <!-- Main Footer -->
  @include('clients.layouts.footer')
  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
</div>
<!-- Vendor JS Files -->
    <script src="{{ asset('dist/vendor/purecounter/purecounter.js') }}"></script>
    <script src="{{ asset('dist/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('dist/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dist/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('dist/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('dist/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('dist/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('dist/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Template Main JS File -->
    <script src="{{ asset('dist/js/main.js') }}"></script>
<!-- Bot man vendor -->
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css"> -->
    <script>
        var botmanWidget = {
            title: 'Safina',
            aboutText: 'Al-Safinat.net',
            aboutLink: '{{ url("/") }}',
            introMessage: "Hi! ✋<br>I'm Safina.",
            mainColor: '#fcba03',
            bubbleBackground: '#fcba03'
        };
    </script>
    <script src='{{ asset("dist/js/botman-widget.js") }}'></script>
    @stack('scripts')
</body>
</html>