<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Starter</title>

  @vite(['resources/css/app.css', 'resources/js/app.js'])
  
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  @include('backend.layouts.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('backend.layouts.sidebar')

  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2022 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<script type="text/javascript">
$('#inputLevel').select2({
        placeholder: 'Select Level'
});

$('#inputManager').select2({
        placeholder: 'Select Manager'
});


$('#inputPosition').select2({
        placeholder: 'Select Position',
        ajax: {
            url: '/positions/search',
            dataType: 'json',
    processResults: function (data) {
      return {
        results:  $.map(data, function (item) {
              return {
                  text: item.position,
                  id: item.id
              }
          })
      };
    },
    cache: true
  }
});

$(document).on('change','#inputLevel', function () {

var level = $(this).val();

$('#inputManager').select2({
        placeholder: 'Select Manager',
        ajax: {
            url: '/managers/search',
            dataType: 'json',
            data: {'level': level},
    processResults: function (data) {
      return {
        results:  $.map(data, function (item) {
              return {
                  text: item.full_name,
                  id: item.id
              }
          })
      };
    },
    cache: true
  }
});
});

//Initialize Select2 Elements
$('.select2bs4').select2({
  theme: 'bootstrap4'
})

//Datemask 
$('#inputDate').inputmask('dd.mm.yy', { 'placeholder': 'dd.mm.yy' })
$('[data-mask]').inputmask()
</script>
<script>
@if(Session::has('message'))
var type = "{{ Session::get('alert-type', 'info') }}"
switch(type) {
    case 'info':
    toastr.info(" {{ Session::get('message') }} ");
    break;

    case 'success':
    toastr.success(" {{ Session::get('message') }} ");
    break;

    case 'warning':
    toastr.warning(" {{ Session::get('message') }} ");
    break;

    case 'error':
    toastr.error(" {{ Session::get('message') }} ");
    break;

}
@endif
</script>
</body>
</html>