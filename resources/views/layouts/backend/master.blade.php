<!DOCTYPE html>
<html lang="en">


<head>
    @include('layouts.backend.head')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="http://127.0.0.1:8000/backend/assets/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
</div>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    @include('layouts.backend.main-header')
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    @include('layouts.backend.main-sidebar')
</aside>

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
    @yield('content')
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    @include('layouts.backend.footer')
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include("layouts.backend.script")
</body>
</html>
