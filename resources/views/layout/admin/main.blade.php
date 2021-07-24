<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="/plugins/select2/css/select2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
    <!-- summernote -->
    <link rel="stylesheet" href="/plugins/summernote/summernote-bs4.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- color picker -->
    <link rel="stylesheet" href="/plugins/spectrum/dist/spectrum.min.css">
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    @include('layout.admin.sidebar')
    @yield('content')
</div>
<!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/dist/js/demo.js"></script>
<!-- Summernote -->
<script src="/plugins/summernote/summernote-bs4.min.js"></script>
<!-- color picker -->
<script src="/plugins/spectrum/dist/spectrum.min.js"></script>
<script src="/plugins/moment/moment.min.js"></script>
<!-- Select2 -->
<script src="/plugins/select2/js/select2.full.min.js"></script>

@stack('js')
</body>
</html>
