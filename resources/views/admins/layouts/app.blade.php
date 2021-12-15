<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @yield('page-title')
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  @stack('styles')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  @include('admins.layouts.navigation')
  <!-- Main Sidebar Container -->
  @include('admins.layouts.sidebar')
  <!-- Content -->
  <div class="content-wrapper">
  @yield('content-header')
    <div class="content">
      <div class="container-fluid">
        <!-- <div class="row"> -->
          <!-- <div class="col-lg-12"> -->
            @yield('content')
          <!-- </div> -->
        <!-- </div> -->
      </div>
    </div>
  </div>

  <!-- Right Sidebar -->
  @include('admins.layouts.right_sidebar')

  <!-- Main Footer -->
  @include('admins.layouts.footer')

  <!-- <aside class="control-sidebar control-sidebar-dark"></aside> -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
  <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
  <script>
  $.widget.bridge('uibutton', $.ui.button)
  </script>
<!-- Bootstrap 4 -->
  <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
  <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  @stack('scripts')
</body>
</html>