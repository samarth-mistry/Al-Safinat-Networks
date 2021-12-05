<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <section class="page-title">  
      @yield('page-title')
  </section>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  @include('admins.layouts.navigation')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('admins.layouts.sidebar')

  <!-- Content -->
  <div class="content-wrapper">
    <section class="content">
      @yield('content')
    </section>
  </div>

  <!-- Control Sidebar -->
  @include('admins.layouts.right_sidebar')

  <!-- Main Footer -->
  @include('admins.layouts.footer')
</div>
<!-- ./wrapper -->

<!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
</body>
</html>