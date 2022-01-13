<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{ asset('adminTLE/plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/jqvmap/jqvmap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('adminLTE/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/daterangepicker/daterangepicker.css')}}">
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/summernote/summernote-bs4.min.css')}}">

  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.tiny.cloud/1/qjpog61mo557zet57296t83vt760j6s7zwzd21tkiv9tmbhm/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('adminLTE/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
  </div>

  @include('inc/header')

  @include('inc/siderbar')
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@yield('page')</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          @yield('content')
        </div>
      </div>
    </section>
  </div>

</div>

<script src="{{asset('adminLTE/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('adminLTE/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="{{ asset('adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('adminLTE/plugins/chart.js/Chart.min.js')}}"></script>
<script src="{{ asset('adminLTE/plugins/sparklines/sparkline.js')}}"></script>
<script src="{{ asset('adminLTE/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{ asset('adminLTE/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<script src="{{ asset('adminLTE/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<script src="{{ asset('adminLTE/plugins/moment/moment.min.js')}}"></script>
<script src="{{ asset('adminLTE/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{ asset('adminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<script src="{{ asset('adminLTE/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{ asset('adminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<script src="{{ asset('adminLTE/dist/js/adminlte.js')}}"></script>
<script src="{{ asset('adminLTE/dist/js/demo.js')}}"></script>
<script src="{{ asset('adminLTE/dist/js/pages/dashboard.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  $(document).ready(function() {
    $(".select2").select2();
  });
</script>

<script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
@yield('js')
</body>
</html>
