<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <base href="./">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- CSRF Token -->

  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Vendors styles-->
  <link rel="stylesheet" href="{{ asset('coreui/vendors/simplebar/css/simplebar.css') }}">
  <link rel="stylesheet" href="{{ asset('coreui/css/vendors/simplebar.css') }}">
  <!-- Main styles for this application-->
  <!-- <link href="{{ asset('coreui/css/style.css') }}" rel="stylesheet"> -->


  <!-- CoreUI for Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.2.0/dist/css/coreui.rtl.min.css" integrity="sha384-7W1eMOzj3wRp1Oat/SJe+uPZ3lBB5YWlrjI9zeLbto2KkseMeJKSGAs4844qZPjz" crossorigin="anonymous">

  <style>
    html:not([dir=ltr]) .wrapper {
      padding-right: var(--cui-sidebar-occupy-start, 0) !important;
    }
  </style>

</head>

<body lang="ar" dir="rtl">
  @include('layouts.partials.sidebar')

  <div class="wrapper d-flex flex-column min-vh-100 bg-light" lang="ar" dir="rtl">
    @include('layouts.partials.header')

    <div class="body flex-grow-1 px-3">
      <div class="container-lg">
        @yield('content')
      </div>
    </div>

    @include('layouts.partials.footer')

  </div>

  <!-- Option 1: CoreUI for Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.2.0/dist/js/coreui.bundle.min.js" integrity="sha384-n0qOYeB4ohUPebL1M9qb/hfYkTp4lvnZM6U6phkRofqsMzK29IdkBJPegsyfj/r4" crossorigin="anonymous"></script>

  <!-- CoreUI and necessary plugins-->
  <!-- <script src="{{ asset('coreui/vendors/@coreui/coreui/js/coreui.bundle.min.js') }}"></script> -->
  <script src="{{ asset('coreui/vendors/simplebar/js/simplebar.min.js') }}"></script>


  <script>
  </script>

</body>

</html>