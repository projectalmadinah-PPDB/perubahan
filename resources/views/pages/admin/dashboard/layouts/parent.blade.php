<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.6/datatables.min.css" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
    <title>PPDB | @yield('title')</title>
    
    @include('pages.admin.dashboard.layouts.include')
    @stack('add-styles')
  </head>
  <body>
      @include('pages.admin.dashboard.layouts.navbar')
      <div class="wrapper">
        @yield('content')
      </div>
      @include('pages.admin.dashboard.layouts.aside')
    @include('pages.admin.dashboard.layouts.script')
    @stack('add-script')
    <script src="https://cdn.datatables.net/v/dt/dt-1.13.6/datatables.min.js"></script>
  </body>
</html>