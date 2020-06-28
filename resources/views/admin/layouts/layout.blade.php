<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <title> @yield('title') </title>
  {{-- Include styles --}}
  @include('admin.layouts.styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

   {{-- Include header --}}
   @include('admin.layouts.header')
 
   {{-- Include left sidebar --}}
   @include('admin.layouts.leftsidebar')
  
  <div class="content-wrapper">
    @section('content')
    @show
  </div>
 
  {{-- Include footer --}}
  @include('admin.layouts.footer')
 
</div>
<!-- ./wrapper -->


 @include('admin.layouts.scripts')
</body>
</html>
